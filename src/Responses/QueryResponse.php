<?php

namespace Coreproc\PaynamicsSdk\Responses;

use Coreproc\PaynamicsSdk\Responses\Traits\Interpreter;

class QueryResponse
{
    use Interpreter;

    /**
     * @var string
     */
    public string $response;

    /**
     * Create new instance of query response
     *
     * @return QueryResponse
     */
    public static function make(): QueryResponse
    {
        return new self();
    }

    /**
     * Set response of query
     *
     * @param string $response
     * @return $this
     */
    public function setResponse(string $response): QueryResponse
    {
        $this->response = $response;
        return $this;
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
