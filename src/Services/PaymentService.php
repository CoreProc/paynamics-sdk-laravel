<?php

namespace Coreproc\PaynamicsSdk\Services;

use Coreproc\PaynamicsSdk\Services\Interfaces\RequestInterface;
use Coreproc\PaynamicsSdk\Services\Clients\PostClient;
use Coreproc\PaynamicsSdk\Responses\PaymentResponse;
use Coreproc\PaynamicsSdk\Request\PaymentRequest;
use Coreproc\PaynamicsSdk\Request\ItemRequest;
use Coreproc\PaynamicsSdk\Traits\Formatter;
use Coreproc\PaynamicsSdk\PaynamicsClient;
use SimpleXMLElement;
use Exception;

class PaymentService implements RequestInterface
{
    use Formatter;

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
     * @var array
     */
    public array $signaturePattern = [
        'mid',
        'request_id',
        'ip_address',
        'notification_url',
        'response_url',
        'fname',
        'lname',
        'mname',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'zip',
        'email',
        'phone',
        'client_ip',
        'amount',
        'currency',
        'secure3d',
        'merchantkey',
    ];

    /**
     * PaymentRequest constructor.
     */
    public function __construct()
    {
        $this->paynamicsClient = app(PaynamicsClient::class);
        $this->xml = (new SimpleXMLElement('<Request/>'));
        $this->requestId = '60fe8ff8c48de'; //substr(uniqid(), 0, 13);
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
     * Send payment post request
     *
     * @return PaymentResponse
     */
    public function post(): PaymentResponse
    {
        if (empty($this->payment)) {
            throw new Exception('No request found. Please set the request body.');
        }

        return PostClient::payment(['paymentrequest' => base64_encode($this->toXml())]);
    }

    /**
     * Generate XML data for payment request
     *
     * @return string
     */
    public function toXml(): string
    {
        if (empty($this->payment)) {
            throw new Exception('No request found. Please set the request body.');
        }

        foreach ($this->payment->fillable as $attribute) {
            if ($attribute === 'orders') {
                $itemsXml = $this->xml->addChild('orders')->addChild('items');

                /** @var ItemRequest $item */
                foreach ($this->payment->orders as $item) {
                    $itemXml = $itemsXml->addChild('Items');
                    $itemXml->addChild('itemname', $item->item_name);
                    $itemXml->addChild('quantity', $item->quantity);
                    $itemXml->addChild('amount', $this->toPaynamicsAmountFormat($item->amount));
                }
            }elseif ($attribute === 'amount') {
                $this->xml->addChild(
                    $attribute,
                    $this->toPaynamicsAmountFormat($this->payment->$attribute ?? 0)
                );
            } else {
                $this->xml->addChild($attribute, $this->payment->$attribute ?? '');
            }
        }
        $this->xml->addChild('mid', $this->paynamicsClient->getMerchantId());
        $this->xml->addChild('request_id', $this->requestId);
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
        if (empty($this->payment)) {
            throw new Exception('No request found. Please set the request body.');
        }

        $toSign = '';
        foreach ($this->signaturePattern as $pattern) {
            if ($pattern === 'mid') {
                $toSign = $toSign . $this->paynamicsClient->getMerchantId();
            }elseif ($pattern === 'request_id') {
                $toSign = $toSign . $this->requestId;
            }elseif ($pattern === 'merchantkey') {
                $toSign = $toSign . $this->paynamicsClient->getMerchantKey();
            }else {
                $toSign = isset($this->payment->$pattern)
                    ? $pattern === 'amount'
                        ? $toSign . $this->toPaynamicsAmountFormat($this->payment->$pattern)
                        : $toSign . $this->payment->$pattern
                    : $toSign;
            }
        }

        return hash('sha512', $toSign);
    }
}
