<?php

namespace Coreproc\PaynamicsSdk\Services;

use Coreproc\PaynamicsSdk\HsbcClient;
use Coreproc\PaynamicsSdk\Services\Interfaces\RequestInterface;
use Coreproc\PaynamicsSdk\Services\Traits\GenerateForm;
use Coreproc\PaynamicsSdk\Requests\PaymentRequest;
use Coreproc\PaynamicsSdk\Requests\ItemRequest;
use Coreproc\PaynamicsSdk\PaynamicsClient;
use SimpleXMLElement;
use Exception;

class PaymentService implements RequestInterface
{
    use GenerateForm;

    /**
     * @var SimpleXMLElement
     */
    public SimpleXMLElement $xml;

    /**
     * @var PaymentRequest
     */
    public PaymentRequest $payment;

    /**
     * @var PaynamicsClient
     */
    public PaynamicsClient $paynamicsClient;

    /**
     * @var string
     */
    public string $requestId;

    /**
     * @var string
     */
    public string $payment_type = 'default';

    /**
     * @var HsbcClient
     */
    public HsbcClient $hsbcClient;

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
     * Set 3rd party payment type
     *
     * @param string $type
     * @return PaymentService
     */
    public function setPaymentType(string $type): PaymentService
    {
        $this->payment_type = $type;
        return $this;
    }

    /**
     * Create new instance of payment request
     *
     * @return PaymentService
     */
    public static function make(): PaymentService
    {
        return new self();
    }

    /**
     * Set request data for payment service
     *
     * @param PaymentRequest $payment
     * @return PaymentService
     */
    public function setRequest(PaymentRequest $payment): PaymentService
    {
        $this->payment = $payment;
        return $this;
    }

    /**
     * Generate XML data for payment request
     *
     * @return string
     * @throws Exception
     */
    public function toXml(): string
    {
        $merchantId = $this->payment_type !== 'hsbc'
            ? $this->paynamicsClient->getMerchantId()
            : $this->hsbcClient->getMerchantId();

        if (empty($this->payment)) {
            throw new Exception('No request found. Please set the request body.');
        }

        $itemsXml = $this->xml->addChild('orders')->addChild('items');

        /** @var ItemRequest $item */
        foreach ($this->payment->getOrders() as $item) {
            $itemXml = $itemsXml->addChild('Items');
            $itemXml->addChild('itemname', $item->getItemName());
            $itemXml->addChild('quantity', $item->getQuantity());
            $itemXml->addChild('amount', $item->getAmount());
        }

        $this->xml->addChild('mid', $merchantId);
        $this->xml->addChild('request_id', $this->requestId);
        $this->xml->addChild('ip_address', $this->payment->getIpAddress());
        $this->xml->addChild('notification_url', $this->payment->getNotificationUrl());
        $this->xml->addChild('response_url', $this->payment->getResponseUrl());
        $this->xml->addChild('cancel_url', $this->payment->getCancelUrl());
        $this->xml->addChild('mtac_url', $this->payment->getMtacUrl());
        $this->xml->addChild('descriptor_note', $this->payment->getDescriptorNote());
        $this->xml->addChild('fname', $this->payment->getFname());
        $this->xml->addChild('lname', $this->payment->getLname());
        $this->xml->addChild('mname', $this->payment->getMname());
        $this->xml->addChild('address1', $this->payment->getAddress1());
        $this->xml->addChild('address2', $this->payment->getAddress2());
        $this->xml->addChild('city', $this->payment->getCity());
        $this->xml->addChild('state', $this->payment->getState());
        $this->xml->addChild('country', $this->payment->getCountry());
        $this->xml->addChild('zip', $this->payment->getZip());
        $this->xml->addChild('secure3d', $this->payment->getSecure3d());
        $this->xml->addChild('trxtype', $this->payment->getTrxtype());
        $this->xml->addChild('email', $this->payment->getEmail());
        $this->xml->addChild('phone', $this->payment->getPhone());
        $this->xml->addChild('mobile', $this->payment->getMobile());
        $this->xml->addChild('client_ip', $this->payment->getClientIp());
        $this->xml->addChild('amount', $this->payment->getAmount());
        $this->xml->addChild('currency', $this->payment->getCurrency());
        $this->xml->addChild('expiry_limit', $this->payment->getExpiryLimit());
        $this->xml->addChild('mlogo_url', $this->payment->getMLogoUrl());
        $this->xml->addChild('pmethod', $this->payment->getPmethod());
        $this->xml->addChild('metadata2', $this->payment->getMetadata2());
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
        $merchantId = $this->payment_type !== 'hsbc'
            ? $this->paynamicsClient->getMerchantId()
            : $this->hsbcClient->getMerchantId();

        $merchantKey = $this->payment_type !== 'hsbc'
            ? $this->paynamicsClient->getMerchantKey()
            : $this->hsbcClient->getMerchantKey();

        if (empty($this->payment)) {
            throw new Exception('No request found. Please set the request body.');
        }

        $toSign = $merchantId
            . $this->requestId
            . $this->payment->getIpAddress()
            . $this->payment->getNotificationUrl()
            . $this->payment->getResponseUrl()
            . $this->payment->getFname()
            . $this->payment->getLname()
            . $this->payment->getMname()
            . $this->payment->getAddress1()
            . $this->payment->getAddress2()
            . $this->payment->getCity()
            . $this->payment->getState()
            . $this->payment->getCountry()
            . $this->payment->getZip()
            . $this->payment->getEmail()
            . $this->payment->getPhone()
            . $this->payment->getClientIp()
            . $this->payment->getAmount()
            . $this->payment->getCurrency()
            . $this->payment->getSecure3d()
            . $merchantKey;

        return hash('sha512', $toSign);
    }
}
