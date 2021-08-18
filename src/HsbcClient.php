<?php

namespace Coreproc\PaynamicsSdk;

class HsbcClient
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
        $this->merchantId = $credentials['hsbc']['merchant_id'];
        $this->merchantKey = $credentials['hsbc']['merchant_key'];
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
            throw new Exception('No HSBC merchant id set.');
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
            throw new Exception('No HSBC merchant key set.');
        }

        return $this->merchantKey;
    }
}
