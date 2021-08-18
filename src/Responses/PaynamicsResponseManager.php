<?php

namespace Coreproc\PaynamicsSdk\Responses;

use Coreproc\PaynamicsSdk\PaynamicsClient;
use Coreproc\PaynamicsSdk\HsbcClient;

class PaynamicsResponseManager
{
    /**
     * Create new instance of response type supplied
     *
     * @param string $type
     * @return mixed
     */
    public static function make(string $type)
    {
        if (! array_key_exists($type, self::responses())) {
            throw new \InvalidArgumentException('Response type not found.');
        }

        $response = self::responses()[$type];

        if (self::validMerchantId($response->merchantId())) {
            throw new \Exception('Merchant ID did not match on environment credentials.');
        }

        return $response;
    }

    /**
     * Check if the merchant ID in payload is correct
     *
     * @param string $merchantId
     * @return bool
     */
    protected static function validMerchantId(string $merchantId): bool
    {
        $paynamicsClient = app(PaynamicsClient::class);
        $hsbcClient = app(HsbcClient::class);

        return $merchantId !== $paynamicsClient->getMerchantId()
            || $merchantId !== $hsbcClient->getMerchantId();
    }

    /**
     * Get list of responses
     *
     * @return array
     */
    public static function responses(): array
    {
        return [
            'notification' => NotificationResponse::make(),
            'rebill' => RebillResponse::make(),
            'query' => QueryResponse::make(),
            'refund' => RefundResponse::make(),
        ];
    }
}
