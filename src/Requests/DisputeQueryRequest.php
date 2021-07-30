<?php

namespace Coreproc\PaynamicsSdk\Requests;

class DisputeQueryRequest
{
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
    protected string $disputeStartDate;

    /**
     * @var string
     */
    protected string $disputeEndDate;

    /**
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->ipAddress ?? '';
    }

    /**
     * @param string $ipAddress
     * @return DisputeQueryRequest
     */
    public function setIpAddress(string $ipAddress): DisputeQueryRequest
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
     * @return DisputeQueryRequest
     */
    public function setNotificationUrl(string $notificationUrl): DisputeQueryRequest
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
     * @return DisputeQueryRequest
     */
    public function setResponseUrl(string $responseUrl): DisputeQueryRequest
    {
        $this->responseUrl = $responseUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisputeStartDate(): string
    {
        return $this->disputeStartDate ?? '';
    }

    /**
     * @param string $disputeStartDate
     * @return DisputeQueryRequest
     */
    public function setDisputeStartDate(string $disputeStartDate): DisputeQueryRequest
    {
        $this->disputeStartDate = $disputeStartDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisputeEndDate(): string
    {
        return $this->disputeEndDate ?? '';
    }

    /**
     * @param string $disputeEndDate
     * @return DisputeQueryRequest
     */
    public function setDisputeEndDate(string $disputeEndDate): DisputeQueryRequest
    {
        $this->disputeEndDate = $disputeEndDate;
        return $this;
    }

    /**
     * Create new instance for dispute query request
     *
     * @return DisputeQueryRequest
     */
    public static function make(): DisputeQueryRequest
    {
        return new self();
    }

}
