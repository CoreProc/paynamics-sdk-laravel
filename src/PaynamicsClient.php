<?php

namespace Coreproc\PaynamicsSdk;

use Exception;

class PaynamicsClient
{
    /**
     * Paynamics merchant key
     *
     * @var string
     */
    protected string $merchantKey;

    /**
     * Paynamics merchant id
     *
     * @var string
     */
    protected string $merchantId;

    /**
     * Paynamics gateway endpoint
     *
     * @var string
     */
    protected string $endpoint;

    /**
     * Client constructor.
     * @param array $credentials
     */
    public function __construct($credentials)
    {
        $this->merchantId = $credentials['merchant_id'];
        $this->merchantKey = $credentials['merchant_key'];
        $this->endpoint = $credentials['environment'] !== 'production'
            ? $credentials['endpoint']['sandbox']
            : $credentials['endpoint']['production'];
    }

    /**
     * Get merchant id
     *
     * @return string
     * @throws Exception
     */
    public function getMerchantId(): string
    {
        if (empty($this->merchantId)) {
            throw new Exception('No paynamics merchant id set.');
        }

        return $this->merchantId;
    }

    /**
     * Get merchant key
     *
     * @return string
     * @throws Exception
     */
    public function getMerchantKey(): string
    {
        if (empty($this->merchantId)) {
            throw new Exception('No paynamics merchant key set.');
        }

        return $this->merchantKey;
    }

    /**
     * Get paynamics endpoint
     *
     * @return string
     * @throws Exception
     */
    public function getEndpoint(): string
    {
        if (empty($this->endpoint)) {
            throw new Exception('No paynamics endpoint found.');
        }

        return $this->endpoint;
    }
}
