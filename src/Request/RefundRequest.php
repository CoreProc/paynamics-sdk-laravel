<?php

namespace Coreproc\PaynamicsSdk\Request;

use Coreproc\PaynamicsSdk\Traits\Formatter;

class RefundRequest
{
    use Formatter;

    /**
     * @var string
     */
    protected string $orgTrxId;

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
     * @var float
     */
    protected float $amount;

    /**
     * @return string
     */
    public function getOrgTrxId(): string
    {
        return $this->orgTrxId;
    }

    /**
     * @param string $orgTrxId
     * @return RefundRequest
     */
    public function setOrgTrxId(string $orgTrxId): RefundRequest
    {
        $this->orgTrxId = $orgTrxId;
        return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     * @return RefundRequest
     */
    public function setIpAddress(string $ipAddress): RefundRequest
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
     * @return RefundRequest
     */
    public function setNotificationUrl(string $notificationUrl): RefundRequest
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
     * @return RefundRequest
     */
    public function setResponseUrl(string $responseUrl): RefundRequest
    {
        $this->responseUrl = $responseUrl;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->toPaynamicsAmountFormat($this->amount);
    }

    /**
     * @param float $amount
     * @return RefundRequest
     */
    public function setAmount(float $amount): RefundRequest
    {
        $this->amount = $amount;
        return $this;
    }
}
