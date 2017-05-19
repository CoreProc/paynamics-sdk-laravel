<?php namespace Coreproc\Paynamics\Client;

use Coreproc\Paynamics\Requests\PaynamicsRequest;
use Coreproc\Paynamics\Requests\PaynamicsRequestBody;
use Coreproc\Paynamics\Requests\PaynamicsRequestBodyInterface;
use Coreproc\Paynamics\Requests\PaynamicsRequestInterface;
use Coreproc\Paynamics\Responses\PaynamicsResponseInterface;
use GuzzleHttp\Client;

class PaynamicsClient implements PaynamicsClientInterface
{
    const PRODUCTION_URL = '';

    const SANDBOX_URL = 'https://testpti.payserv.net/webpaymentV2/default.aspx';

    /**
     * @var string
     */
    private $merchantId;

    /**
     * @var string
     */
    private $merchantKey;

    /**
     * @var bool
     */
    private $sandbox;

    private $httpClient;

    public function __construct($merchantId = '', $merchantKey = '', $sandbox = false)
    {
        $this->setMerchantId($merchantId);
        $this->setMerchantKey($merchantKey);
        $this->setSandbox($sandbox);

        $this->httpClient = new Client;
    }

    /**
     * Returns the HTTP Client
     *
     * @return Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * Returns the request URL to be used. Depends if sandbox or production.
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->isSandbox() ? self::SANDBOX_URL : self::PRODUCTION_URL;
    }

    /**
     * Returns if sandbox or production.
     *
     * @return bool
     */
    public function isSandbox()
    {
        return $this->sandbox;
    }

    /**
     * Sets if sandbox or production.
     *
     * @param bool $sandbox
     * @return self
     */
    public function setSandbox($sandbox)
    {
        $this->sandbox = $sandbox;

        return $this;
    }

    /**
     * Returns assigned Merchant ID
     *
     * @return string
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * Returns assigned Merchant Key
     *
     * @return string
     */
    public function getMerchantKey()
    {
        return $this->merchantKey;
    }

    /**
     * Sets Merchant ID
     *
     * @param $merchantId
     * @return self
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;

        return $this;
    }

    /**
     * Sets Merchant Key
     *
     * @param $merchantKey
     * @return self
     */
    public function setMerchantKey($merchantKey)
    {
        $this->merchantKey = $merchantKey;

        return $this;
    }

    /**
     * Create new request
     *
     * @param PaynamicsRequestBodyInterface $requestBody
     * @param array $options
     * @return PaynamicsRequestInterface
     */
    public function createRequest(PaynamicsRequestBodyInterface $requestBody, array $options = [])
    {
        return new PaynamicsRequest($this, $requestBody, $options);
    }

    /**
     * Create new request and execute
     *
     * @param PaynamicsRequestBodyInterface $requestBody
     * @return PaynamicsResponseInterface
     */
    public function send(PaynamicsRequestBodyInterface $requestBody)
    {
        return $this->createRequest($requestBody)->execute();
    }
}