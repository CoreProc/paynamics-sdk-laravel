<?php

namespace Coreproc\PaynamicsSdk\Services;

use Coreproc\PaynamicsSdk\Services\Interfaces\RequestInterface;
use Coreproc\PaynamicsSdk\Services\Traits\GenerateForm;
use Coreproc\PaynamicsSdk\Requests\RebillRequest;
use Coreproc\PaynamicsSdk\PaynamicsClient;
use SimpleXMLElement;

class RebillService implements RequestInterface
{
    use GenerateForm;

    /**
     * @var SimpleXMLElement
     */
    protected SimpleXMLElement $xml;

    /**
     * @var RebillRequest
     */
    protected RebillRequest $rebillRequest;

    /**
     * @var PaynamicsClient
     */
    protected PaynamicsClient $paynamicsClient;

    /**
     * @var string
     */
    protected string $requestId;

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
     * Create new instance of rebill service
     *
     * @return RebillService
     */
    public static function make(): RebillService
    {
        return new self();
    }

    /**
     * Generate XML data for payment request
     *
     * @return string
     */
    public function toXml(): string
    {
        if (empty($this->rebillRequest)) {
            throw new Exception('No request found. Please set the request body.');
        }

        $this->xml->addChild('merchantid', $this->paynamicsClient->getMerchantId());
        $this->xml->addChild('request_id', $this->requestId);
        $this->xml->addChild('ip_address ', $this->rebillRequest->getIpAddress());
        $this->xml->addChild('org_trxid ', $this->rebillRequest->getOrgTrxId());
        $this->xml->addChild('token_id ', $this->rebillRequest->getTokenId());
        $this->xml->addChild('trx_type ', $this->rebillRequest->getTrxType());
        $this->xml->addChild('amount ', $this->rebillRequest->getAmount());
        $this->xml->addChild('notification_url ', $this->rebillRequest->getNotificationUrl());
        $this->xml->addChild('response_url  ', $this->rebillRequest->getResponseUrl());
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
        if (empty($this->rebillRequest)) {
            throw new Exception('No request found. Please set the request body.');
        }

        $toSign = $this->paynamicsClient->getMerchantId()
            . $this->requestId
            . $this->rebillRequest->getIpAddress()
            . $this->rebillRequest->getOrgTrxId()
            . $this->rebillRequest->getTokenId()
            . $this->rebillRequest->getNotificationUrl()
            . $this->rebillRequest->getResponseUrl()
            . $this->rebillRequest->getAmount()
            . $this->paynamicsClient->getMerchantKey();

        return hash('sha512', $toSign);
    }
}
