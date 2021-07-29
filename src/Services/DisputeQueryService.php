<?php

namespace Coreproc\PaynamicsSdk\Services;

use Coreproc\PaynamicsSdk\PaynamicsClient;
use Coreproc\PaynamicsSdk\Request\DisputeQueryRequest;
use Coreproc\PaynamicsSdk\Services\Interfaces\RequestInterface;
use Coreproc\PaynamicsSdk\Services\Traits\GenerateForm;
use Exception;
use SimpleXMLElement;

class DisputeQueryService implements RequestInterface
{
    use GenerateForm;

    /**
     * @var SimpleXMLElement
     */
    public SimpleXMLElement $xml;

    /**
     * @var DisputeQueryRequest
     */
    public DisputeQueryRequest $disputeQuery;

    /**
     * @var PaynamicsClient
     */
    public PaynamicsClient $paynamicsClient;

    /**
     * @var string
     */
    public string $requestId;

    /**
     * PaymentRequest constructor.
     */
    public function __construct()
    {
        $this->paynamicsClient = app(PaynamicsClient::class);
        $this->requestId = substr(uniqid(), 0, 13);
        $this->xml = (new SimpleXMLElement('<Request/>'));
    }

    /**
     * Create new instance of dispute query service
     *
     * @return DisputeQueryService
     */
    public static function make(): DisputeQueryService
    {
        return new self();
    }

    /**
     * Set request data for dispute query service
     *
     * @param DisputeQueryRequest $disputeQuery
     * @return DisputeQueryService
     */
    public function setRequest(DisputeQueryRequest $disputeQuery): DisputeQueryService
    {
        $this->disputeQuery = $disputeQuery;
        return $this;
    }

    /**
     * Generate XML data for dispute query request
     *
     * @return string
     * @throws Exception
     */
    public function toXml(): string
    {
        if (empty($this->disputeQuery)) {
            throw new Exception('No request found. Please set the request body.');
        }

        $this->xml->addChild('merchantid', $this->paynamicsClient->getMerchantId());
        $this->xml->addChild('request_id', $this->requestId);
        $this->xml->addChild('ip_address', $this->disputeQuery->getIpAddress());
        $this->xml->addChild('notification_url', $this->disputeQuery->getNotificationUrl());
        $this->xml->addChild('response_url', $this->disputeQuery->getResponseUrl());
        $this->xml->addChild('dispute_start_date', $this->disputeQuery->getDisputeStartDate());
        $this->xml->addChild('dispute_end_date', $this->disputeQuery->getDisputeEndDate());
        $this->xml->addChild('signature', $this->signature());
        return $this->xml->asXML();
    }

    /**
     * Generate signature for dispute query request
     *
     * @return string
     * @throws Exception
     */
    public function signature(): string
    {
        if (empty($this->disputeQuery)) {
            throw new Exception('No request found. Please set the request body.');
        }

        $toSign = $this->paynamicsClient->getMerchantId()
            . $this->requestId
            . $this->disputeQuery->getIpAddress()
            . $this->disputeQuery->getNotificationUrl()
            . $this->disputeQuery->getResponseUrl()
            . $this->disputeQuery->getDisputeStartDate()
            . $this->disputeQuery->getDisputeEndDate()
            . $this->paynamicsClient->getMerchantKey();

        return hash('sha512', $toSign);
    }
}
