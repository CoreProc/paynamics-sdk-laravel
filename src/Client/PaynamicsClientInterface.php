<?php namespace Coreproc\Paynamics\Client;

use Coreproc\Paynamics\Requests\PaynamicsRequestBodyInterface;
use Coreproc\Paynamics\Requests\PaynamicsRequestInterface;
use Coreproc\Paynamics\Responses\PaynamicsResponseInterface;
use GuzzleHttp\Client;

interface PaynamicsClientInterface
{

    /**
     * Returns the HTTP Client
     *
     * @return Client
     */
    public function getHttpClient();

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
    public function setSandbox($sandbox);

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
     * @param PaynamicsRequestBodyInterface $requestBody
     * @param array $options
     * @return PaynamicsRequestInterface
     */
    public function createRequest(PaynamicsRequestBodyInterface $requestBody, array $options = []);

    /**
     * Create new request and execute
     *
     * @param PaynamicsRequestBodyInterface $requestBody
     * @return PaynamicsResponseInterface
     */
    public function send(PaynamicsRequestBodyInterface $requestBody);
}