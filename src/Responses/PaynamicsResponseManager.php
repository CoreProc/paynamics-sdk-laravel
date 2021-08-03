<?php

namespace Coreproc\PaynamicsSdk\Responses;

use Coreproc\PaynamicsSdk\PaynamicsClient;

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
        $paynamicsClient = app(PaynamicsClient::class);

        if (! array_key_exists($type, self::responses())) {
            throw new \InvalidArgumentException('Response type not found.');
        }

        $response = self::responses()[$type];

        if ($response->merchantId !== $paynamicsClient->getMerchantId) {
            throw new \Exception('Merchant ID did not match on environment credentials.');
        }

        return $response;
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
