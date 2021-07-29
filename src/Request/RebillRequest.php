<?php

namespace Coreproc\PaynamicsSdk\Request;

use Coreproc\PaynamicsSdk\Traits\Formatter;

class RebillRequest
{
    use Formatter;

    /**
     * @var string
     */
    protected string $ipAddress;

    /**
     * @var string
     */
    protected string $orgTrxId;

    /**
     * @var string
     */
    protected string $tokenId;

    /**
     * @var string
     */
    protected string $trxType;

    /**
     * @var float
     */
    protected float $amount;

    /**
     * @var string
     */
    protected string $notificationUrl;

    /**
     * @var string
     */
    protected string $responseUrl;

    /**
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     * @return RebillRequest
     */
    public function setIpAddress(string $ipAddress): RebillRequest
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrgTrxId(): string
    {
        return $this->orgTrxId;
    }

    /**
     * @param string $orgTrxId
     * @return RebillRequest
     */
    public function setOrgTrxId(string $orgTrxId): RebillRequest
    {
        $this->orgTrxId = $orgTrxId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTokenId(): string
    {
        return $this->tokenId ?? '';
    }

    /**
     * @param string $tokenId
     * @return RebillRequest
     */
    public function setTokenId(string $tokenId): RebillRequest
    {
        $this->tokenId = $tokenId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrxType(): string
    {
        return $this->trxType;
    }

    /**
     * @param string $trxType
     * @return RebillRequest
     */
    public function setTrxType(string $trxType): RebillRequest
    {
        $this->trxType = $trxType;
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
     * @return RebillRequest
     */
    public function setAmount(float $amount): RebillRequest
    {
        $this->amount = $amount;
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
     * @return RebillRequest
     */
    public function setNotificationUrl(string $notificationUrl): RebillRequest
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
     * @return RebillRequest
     */
    public function setResponseUrl(string $responseUrl): RebillRequest
    {
        $this->responseUrl = $responseUrl;
        return $this;
    }

    /**
     * Create new instance of rebill request
     *
     * @return RebillRequest
     */
    public static function make(): RebillRequest
    {
        return new self();
    }
}
