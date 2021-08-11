<?php

namespace Coreproc\PaynamicsSdk\Requests;

use Coreproc\PaynamicsSdk\Traits\Formatter;

class PaymentRequest
{
    use Formatter;

    /**
     * @var array
     */
    protected array $orders = [];

    /**
     * @var string
     */
    protected string $ipAddress;

    /**
     * @var string
     */
    protected string $notificationUrl;

    /**
     * @var string
     */
    protected string $responseUrl;

    /**
     * @var string
     */
    protected string $cancelUrl;

    /**
     * @var string
     */
    protected string $mtacUrl;

    /**
     * @var string
     */
    protected string $descriptorNote;

    /**
     * @var string
     */
    protected string $fname;

    /**
     * @var string
     */
    protected string $lname;

    /**
     * @var string
     */
    protected string $mname;

    /**
     * @var string
     */
    protected string $address1;

    /**
     * @var string
     */
    protected string $address2;

    /**
     * @var string
     */
    protected string $city;

    /**
     * @var string
     */
    protected string $state;

    /**
     * @var string
     */
    protected string $country;

    /**
     * @var string
     */
    protected string $zip;

    /**
     * @var string
     */
    protected string $secure3d;

    /**
     * @var string
     */
    protected string $trxtype;

    /**
     * @var string
     */
    protected string $email;

    /**
     * @var string
     */
    protected string $phone;

    /**
     * @var string
     */
    protected string $mobile;

    /**
     * @var string
     */
    protected string $clientIp;

    /**
     * @var float
     */
    protected float $amount;

    /**
     * @var string
     */
    protected string $currency;

    /**
     * @var string
     */
    protected string $expiryLimit;

    /**
     * @var string
     */
    protected string $mLogoUrl;

    /**
     * @var string
     */
    protected string $pmethod;

    /**
     * @var string
     */
    protected string $metadata2;

    /**
     * @return string|null
     */
    public function getIpAddress(): ?string
    {
        return $this->ipAddress ?? '';
    }

    /**
     * @param string $ipAddress
     * @return PaymentRequest
     */
    public function setIpAddress(string $ipAddress): PaymentRequest
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotificationUrl(): string
    {
        return $this->notificationUrl ?? '';
    }

    /**
     * @param string $notificationUrl
     * @return PaymentRequest
     */
    public function setNotificationUrl(string $notificationUrl): PaymentRequest
    {
        $this->notificationUrl = $notificationUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getResponseUrl(): string
    {
        return $this->responseUrl ?? '';
    }

    /**
     * @param string $responseUrl
     * @return PaymentRequest
     */
    public function setResponseUrl(string $responseUrl): PaymentRequest
    {
        $this->responseUrl = $responseUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getCancelUrl(): string
    {
        return $this->cancelUrl ?? '';
    }

    /**
     * @param string $cancelUrl
     * @return PaymentRequest
     */
    public function setCancelUrl(string $cancelUrl): PaymentRequest
    {
        $this->cancelUrl = $cancelUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getMtacUrl(): string
    {
        return $this->mtacUrl ?? '';
    }

    /**
     * @param string $mtacUrl
     * @return PaymentRequest
     */
    public function setMtacUrl(string $mtacUrl): PaymentRequest
    {
        $this->mtacUrl = $mtacUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptorNote(): string
    {
        return $this->descriptorNote ?? '';
    }

    /**
     * @param string $descriptorNote
     * @return PaymentRequest
     */
    public function setDescriptorNote(string $descriptorNote): PaymentRequest
    {
        $this->descriptorNote = $descriptorNote;
        return $this;
    }

    /**
     * @return string
     */
    public function getFname(): string
    {
        return $this->fname;
    }

    /**
     * @param string $fname
     * @return PaymentRequest
     */
    public function setFname(string $fname): PaymentRequest
    {
        $this->fname = $fname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLname(): string
    {
        return $this->lname;
    }

    /**
     * @param string $lname
     * @return PaymentRequest
     */
    public function setLname(string $lname): PaymentRequest
    {
        $this->lname = $lname;
        return $this;
    }

    /**
     * @return string
     */
    public function getMname(): string
    {
        return $this->mname ?? '';
    }

    /**
     * @param string $mname
     * @return PaymentRequest
     */
    public function setMname(string $mname): PaymentRequest
    {
        $this->mname = $mname;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress1(): string
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     * @return PaymentRequest
     */
    public function setAddress1(string $address1): PaymentRequest
    {
        $this->address1 = $address1;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress2(): string
    {
        return $this->address2 ?? '';
    }

    /**
     * @param string $address2
     * @return PaymentRequest
     */
    public function setAddress2(string $address2): PaymentRequest
    {
        $this->address2 = $address2;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city ?? '';
    }

    /**
     * @param string $city
     * @return PaymentRequest
     */
    public function setCity(string $city): PaymentRequest
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state ?? '';
    }

    /**
     * @param string $state
     * @return PaymentRequest
     */
    public function setState(string $state): PaymentRequest
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country ?? '';
    }

    /**
     * @param string $country
     * @return PaymentRequest
     */
    public function setCountry(string $country): PaymentRequest
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip ?? '';
    }

    /**
     * @param string $zip
     * @return PaymentRequest
     */
    public function setZip(string $zip): PaymentRequest
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecure3d(): string
    {
        return $this->secure3d ?? '';
    }

    /**
     * @param string $secure3d
     * @return PaymentRequest
     */
    public function setSecure3d(string $secure3d): PaymentRequest
    {
        $this->secure3d = $secure3d;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrxtype(): string
    {
        return $this->trxtype ?? '';
    }

    /**
     * @param string $trxtype
     * @return PaymentRequest
     */
    public function setTrxtype(string $trxtype): PaymentRequest
    {
        $this->trxtype = $trxtype;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email ?? '';
    }

    /**
     * @param string $email
     * @return PaymentRequest
     */
    public function setEmail(string $email): PaymentRequest
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone ?? '';
    }

    /**
     * @param string $phone
     * @return PaymentRequest
     */
    public function setPhone(string $phone): PaymentRequest
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile ?? '';
    }

    /**
     * @param string $mobile
     * @return PaymentRequest
     */
    public function setMobile(string $mobile): PaymentRequest
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientIp(): string
    {
        return $this->clientIp ?? '';
    }

    /**
     * @param string $clientIp
     * @return PaymentRequest
     */
    public function setClientIp(string $clientIp): PaymentRequest
    {
        $this->clientIp = $clientIp;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->toPaynamicsAmountFormat($this->amount ?? 0);
    }

    /**
     * @param float $amount
     * @return PaymentRequest
     */
    public function setAmount(float $amount): PaymentRequest
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return PaymentRequest
     */
    public function setCurrency(string $currency): PaymentRequest
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpiryLimit(): string
    {
        return $this->expiryLimit ?? '';
    }

    /**
     * @param string $expiryLimit
     * @return PaymentRequest
     */
    public function setExpiryLimit(string $expiryLimit): PaymentRequest
    {
        $this->expiryLimit = $expiryLimit;
        return $this;
    }

    /**
     * @return string
     */
    public function getMLogoUrl(): string
    {
        return $this->mLogoUrl ?? '';
    }

    /**
     * @param string $mLogoUrl
     * @return PaymentRequest
     */
    public function setMLogoUrl(string $mLogoUrl): PaymentRequest
    {
        $this->mLogoUrl = $mLogoUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getPmethod(): string
    {
        return $this->pmethod ?? '';
    }

    /**
     * @param string $pmethod
     * @return PaymentRequest
     */
    public function setPmethod(string $pmethod): PaymentRequest
    {
        $this->pmethod = $pmethod;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetadata2(): string
    {
        return $this->metadata2 ?? '';
    }

    /**
     * @param string $metadata2
     * @return PaymentRequest
     */
    public function setMetadata2(string $metadata2): PaymentRequest
    {
        $this->metadata2 = $metadata2;
        return $this;
    }

    /**
     * @return array
     */
    public function getOrders(): array
    {
        return $this->orders;
    }

    /**
     * Create new instance of payment request
     *
     * @return PaymentRequest
     */
    public static function make(): PaymentRequest
    {
        return new self();
    }

    /**
     * Add item to array of items
     *
     * @param ItemRequest $item
     */
    public function addItem(ItemRequest $item)
    {
        array_push($this->orders, $item);
    }
}
