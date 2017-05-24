<?php namespace CoreProc\Paynamics\Paygate;

use Exception;
use GuzzleHttp\Client as GuzzleClient;

class Client implements ClientInterface
{
    private $productionUrl = '';

    private $sandboxUrl = 'https://testpti.payserv.net/webpaymentV2/default.aspx';

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

    public function __construct(array $config = [])
    {
        $this->setConfig($config);

        $this->httpClient = new GuzzleClient;
    }

    /**
     * Returns the HTTP Client
     *
     * @return GuzzleClient
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * Sets configuration
     *
     * @param array $config
     * @return self
     */
    public function setConfig(array $config)
    {
        if (isset($config['merchant_id'])) {
            $this->setMerchantId($config['merchant_id']);
        }
        if (isset($config['merchant_key'])) {
            $this->setMerchantKey($config['merchant_key']);
        }
        if (isset($config['sandbox'])) {
            $this->setSandbox($config['sandbox']);
        }

        return $this;
    }

    /**
     * Returns the request URL to be used. Depends if sandbox or production.
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->isSandbox() ? $this->sandboxUrl : $this->productionUrl;
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
     * @throws Exception
     */
    public function setSandbox($sandbox = false)
    {
        if ( ! is_bool($sandbox)) {
            throw new Exception("Sandbox value should be boolean");
        }

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
     * @throws Exception
     */
    public function setMerchantId($merchantId)
    {
        if ( ! is_string($merchantId)) {
            throw new Exception("Merchant ID should be string");
        }

        $this->merchantId = $merchantId;

        return $this;
    }

    /**
     * Sets Merchant Key
     *
     * @param $merchantKey
     * @return self
     * @throws Exception
     */
    public function setMerchantKey($merchantKey)
    {
        if ( ! is_string($merchantKey)) {
            throw new Exception("Merchant Key should be string");
        }

        $this->merchantKey = $merchantKey;

        return $this;
    }

    /**
     * Create new request
     *
     * @param RequestBodyInterface $requestBody
     * @param array $options
     * @return RequestInterface
     */
    public function createRequest(RequestBodyInterface $requestBody, array $options = [])
    {
        return new PaygateRequest($this, $requestBody, $options);
    }

    /**
     * Create new request and execute
     *
     * @param RequestBodyInterface $requestBody
     * @return ResponseInterface
     */
    public function send(RequestBodyInterface $requestBody)
    {
        return $this->createRequest($requestBody)->execute();
    }
}