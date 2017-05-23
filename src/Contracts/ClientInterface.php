<?php namespace CoreProc\Paynamics\PayGate\Contracts;

use GuzzleHttp\Client;

interface ClientInterface
{

    /**
     * Returns the HTTP Client
     *
     * @return Client
     */
    public function getHttpClient();

    /**
     * Sets configuration
     *
     * @param array $config
     * @return self
     */
    public function setConfig(array $config);

    /**
     * Returns the request URL to be used. Depends if sandbox or production.
     *
     * @return string
     */
    public function getRequestUrl();

    /**
     * Returns if sandbox or production.
     *
     * @return bool
     */
    public function isSandbox();

    /**
     * Sets if sandbox or production.
     *
     * @param bool $sandbox
     */
    public function setSandbox($sandbox = false);

    /**
     * Returns assigned Merchant ID
     *
     * @return string
     */
    public function getMerchantId();

    /**
     * Returns assigned Merchant Key
     *
     * @return string
     */
    public function getMerchantKey();

    /**
     * Sets Merchant ID
     *
     * @param $merchantId
     * @return self
     */
    public function setMerchantId($merchantId);

    /**
     * Sets Merchant Key
     *
     * @param $merchantKey
     * @return self
     */
    public function setMerchantKey($merchantKey);

    /**
     * Create new request
     *
     * @param RequestBodyInterface $requestBody
     * @param array $options
     * @return RequestInterface
     */
    public function createRequest(RequestBodyInterface $requestBody, array $options = []);

    /**
     * Create new request and execute
     *
     * @param RequestBodyInterface $requestBody
     * @return ResponseInterface
     */
    public function send(RequestBodyInterface $requestBody);
}