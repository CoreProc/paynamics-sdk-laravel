<?php

namespace Coreproc\PaynamicsSdk\Responses\Traits;

trait GatewayResponse
{
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
        return $this->toArray()['application']['merchantid'];
    }

    /**
     * Get request id
     *
     * @return mixed
     */
    public function requestId()
    {
        return $this->toArray()['application']['request_id'];
    }

    /**
     * Get response id
     *
     * @return mixed
     */
    public function responseId()
    {
        return $this->toArray()['application']['response_id'];
    }

    /**
     * Get response code
     *
     * @return mixed
     */
    public function responseCode()
    {
        return $this->toArray()['responseStatus']['response_code'];
    }

    /**
     * Get response message
     *
     * @return mixed
     */
    public function responseMessage()
    {
        return $this->toArray()['responseStatus']['response_message'];
    }

    /**
     * Get response advise
     *
     * @return mixed
     */
    public function responseAdvise()
    {
        return $this->toArray()['responseStatus']['response_advise'];
    }

    /**
     * Get timestamp
     *
     * @return mixed
     */
    public function timeStamp()
    {
        return $this->toArray()['application']['timestamp'];
    }

    /**
     * Get processor response id
     *
     * @return mixed
     */
    public function processorResponseId()
    {
        return $this->toArray()['responseStatus']['processor_response_id'];
    }

    /**
     * Get processor response auth code
     *
     * @return mixed
     */
    public function processorResponseAuthCode()
    {
        return $this->toArray()['responseStatus']['processor_response_authcode'];
    }

    /**
     * Get signature
     *
     * @return mixed
     */
    public function signature()
    {
        return $this->toArray()['application']['signature'];
    }

    /**
     * Get payment type
     *
     * @return mixed
     */
    public function pType()
    {
        return $this->toArray()['application']['ptype'];
    }

    /**
     * Get sub data
     *
     * @return mixed
     */
    public function subData()
    {
        return $this->toArray()['sub_data'];
    }

    /**
     * Get sub data
     *
     * @return mixed
     */
    public function transactionHistory()
    {
        return $this->toArray()['transactionHistory'];
    }
}
