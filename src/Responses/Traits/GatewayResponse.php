<?php

namespace Coreproc\PaynamicsSdk\Responses\Traits;

trait GatewayResponse
{
    /**
     * @var string
     */
    public string $response;

    /**
     * @param string $response
     */
    public function setResponse(string $response)
    {
        $this->response = $response;
    }

    /**
     * Get merchant id
     *
     * @return mixed
     */
    public function merchantId()
    {
        return $this->toArray()['merchantid'];
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
     * Get signature
     *
     * @return mixed
     */
    public function signature()
    {
        return $this->toArray()['signature'];
    }
}
