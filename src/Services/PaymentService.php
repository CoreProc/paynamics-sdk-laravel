<?php

namespace Coreproc\PaynamicsSdk\Services;

use Coreproc\PaynamicsSdk\Services\Interfaces\RequestInterface;
use Coreproc\PaynamicsSdk\Services\Clients\PostClient;
use Coreproc\PaynamicsSdk\Request\PaymentRequest;
use Coreproc\PaynamicsSdk\Request\ItemRequest;
use Coreproc\PaynamicsSdk\PaynamicsClient;
use GuzzleHttp\Exception\GuzzleException;
use SimpleXMLElement;
use Exception;

class PaymentService implements RequestInterface
{
    /**
     * @var PaynamicsClient
     */
    public PaynamicsClient $paynamicsClient;

    /**
     * @var SimpleXMLElement
     */
    public SimpleXMLElement $xml;

    /**
     * @var PaymentRequest
     */
    public PaymentRequest $payment;

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
        $this->xml = new SimpleXMLElement('<Request/>');
        $this->requestId = substr(uniqid(), 0, 13);
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
     * @param PaymentRequest $payment
     *
     * @return PaymentService
     */
    public function setRequest(PaymentRequest $payment): PaymentService
    {
        $this->payment = $payment;
        return $this;
    }

    /**
     * Send payment post request
     *
     * @return void
     * @throws Exception
     * @throws GuzzleException
     */
    public function post()
    {
        if (empty($this->payment)) {
            throw new Exception('No request found. Please set the request body.');
        }

        PostClient::make(['paymentrequest' => base64_encode($this->toXml())]);
    }

    /**
     * Generate XML data for payment request
     *
     * @return string
     * @throws Exception
     */
    public function toXml(): string
    {
        if (empty($this->payment)) {
            throw new Exception('No request found. Please set the request body.');
        }

        foreach ($this->payment->fillable as $attribute) {
            if ($attribute === 'orders') {
                $itemsXml = $this->xml->addChild('items');

                /** @var ItemRequest $item */
                foreach ($this->payment->orders as $item) {
                    $itemsXml->addChild('Items')
                        ->addChild('itemname', $item->item_name);
                    $itemsXml->addChild('Items')
                        ->addChild('quantity', $item->quantity);
                    $itemsXml->addChild('Items')
                        ->addChild('amount', $item->quantity);
                }
            } else {
                $this->xml->addChild($attribute, $this->payment->$attribute);
            }
        }

        $this->xml->addChild('mid', $this->paynamicsClient->getMerchantId());
        $this->xml->addChild('request_id', $this->requestId);
        $this->xml->addChild('signature', $this->signature());
        return $this->xml;
    }

    /**
     * Generate signature for payment request
     *
     * @return string
     * @throws Exception
     */
    public function signature(): string
    {
        if (empty($this->payment)) {
            throw new Exception('No request found. Please set the request body.');
        }

        $toSign = $this->paynamicsClient->getMerchantId() .
            $this->requestId
            . $this->payment->ip_address
            . $this->payment->notification_url
            . $this->payment->response_url
            . $this->payment->fname
            . $this->payment->lname
            . $this->payment->mname
            . $this->payment->address1
            . $this->payment->address2
            . $this->payment->city
            . $this->payment->state
            . $this->payment->country
            . $this->payment->zip
            . $this->payment->email
            . $this->payment->phone
            . $this->payment->client_ip
            . $this->payment->amount
            . $this->payment->currency
            . $this->payment->secure3d
            . $this->paynamicsClient->getMerchantKey();

        return hash('sha512', $toSign);
    }
}
