<?php

namespace Coreproc\PaynamicsSdk\Services;

use Coreproc\PaynamicsSdk\Services\Interfaces\RequestInterface;
use Coreproc\PaynamicsSdk\Services\Traits\GenerateForm;
use Coreproc\PaynamicsSdk\Request\RefundRequest;
use Coreproc\PaynamicsSdk\Traits\Formatter;
use Coreproc\PaynamicsSdk\PaynamicsClient;
use SimpleXMLElement;

class RefundService implements RequestInterface
{
    use Formatter, GenerateForm;

    /**
     * @var SimpleXMLElement
     */
    public SimpleXMLElement $xml;

    /**
     * @var RefundRequest
     */
    public RefundRequest $refundRequest;

    /**
     * @var PaynamicsClient
     */
    public PaynamicsClient $paynamicsClient;

    /**
     * @var string
     */
    public string $requestId;

    /**
     * @return RefundService
     */
    public static function make(): RefundService
    {
        return new self();
    }

    /**
     * Set request for refund
     *
     * @return $this
     */
    public function setRequest(RefundRequest $request): RefundService
    {
        $this->refundRequest = $request;
        return $this;
    }

    /**
     * Generate XML data for payment request
     *
     * @return string
     */
    public function toXml(): string
    {
        if (empty($this->refundRequest)) {
            throw new Exception('No request found. Please set the request body.');
        }

        $this->xml->addChild('merchantid', $this->paynamicsClient->getMerchantId());
        $this->xml->addChild('request_id', $this->requestId);
        $this->xml->addChild('org_trxid', $this->refundRequest->getOrgTrxId());
        $this->xml->addChild('ip_address', $this->refundRequest->getIpAddress());
        $this->xml->addChild('notification_url', $this->refundRequest->getNotificationUrl());
        $this->xml->addChild('response_url', $this->refundRequest->getResponseUrl());
        $this->xml->addChild('amount', $this->refundRequest->getAmount());
        $this->xml->addChild('signature', $this->signature());

        return $this->xml->asXML();
    }

    /**
     * Generate signature for payment request
     *
     * @return string
     * @throws Exception
     */
    public function signature(): string
    {
        if (empty($this->refundRequest)) {
            throw new Exception('No request found. Please set the request body.');
        }

        $toSign = $this->paynamicsClient->getMerchantId()
            . $this->requestId
            . $this->refundRequest->getOrgTrxId()
            . $this->refundRequest->getIpAddress()
            . $this->refundRequest->getNotificationUrl()
            . $this->refundRequest->getResponseUrl()
            . $this->refundRequest->getAmount()
            . $this->paynamicsClient->getMerchantKey();

        return hash('sha512', $toSign);
    }
}
