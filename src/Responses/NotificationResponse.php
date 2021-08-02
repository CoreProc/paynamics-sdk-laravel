<?php

namespace Coreproc\PaynamicsSdk\Responses;

use Coreproc\PaynamicsSdk\Responses\Traits\Interpreter;

class NotificationResponse
{
    use Interpreter;

    /**
     * @var string
     */
    public string $response;

    /**
     * Create new instance of notification response
     *
     * @return NotificationResponse
     */
    public static function make(): NotificationResponse
    {
        return new self();
    }

    /**
     * Set response of notification
     *
     * @param string $response
     * @return $this
     */
    public function setResponse(string $response): NotificationResponse
    {
        $this->response = $response;
        return $this;
    }

    /**
     * Get request id
     *
     * @return mixed
     */
    public function requestId()
    {
        return $this->toArray()['request_id'];
    }

    /**
     * Get response id
     *
     * @return mixed
     */
    public function responseId()
    {
        return $this->toArray()['response_id'];
    }

    /**
     * Get response code
     *
     * @return mixed
     */
    public function responseCode()
    {
        return $this->toArray()['response_code'];
    }

    /**
     * Get response message
     *
     * @return mixed
     */
    public function responseMessage()
    {
        return $this->toArray()['response_message'];
    }

    /**
     * Get response advise
     *
     * @return mixed
     */
    public function responseAdvise()
    {
        return $this->toArray()['response_advise'];
    }

    /**
     * Get timestamp
     *
     * @return mixed
     */
    public function timeStamp()
    {
        return $this->toArray()['timestamp'];
    }

    /**
     * Get payment channel
     *
     * @return mixed
     */
    public function pType()
    {
        return $this->toArray()['ptype'];
    }

    /**
     * Get rebill id
     *
     * @return mixed
     */
    public function rebillId()
    {
        return $this->toArray()['rebill_id'];
    }

    /**
     * Get token id
     *
     * @return mixed
     */
    public function tokenId()
    {
        return $this->toArray()['token_id'];
    }

    /**
     * Get Token information
     *
     * @return mixed
     */
    public function tokenInfo()
    {
        return $this->toArray()['token_info'];
    }

    /**
     * Get processor response id
     *
     * @return mixed
     */
    public function processorResponseId()
    {
        return $this->toArray()['processor_response_id'];
    }

    /**
     * Get processor response auth code
     *
     * @return mixed
     */
    public function processorResponseAuthCode()
    {
        return $this->toArray()['processor_response_authcode'];
    }

    /**
     * Get settlement info details
     *
     * @return mixed
     */
    public function settlementInfoDetails()
    {
        return $this->toArray()['settlement_info_details'];
    }

    /**
     * Get signature
     *
     * @return mixed
     */
    public function signature()
    {
        return $this->toArray()['signature'];
    }
}
