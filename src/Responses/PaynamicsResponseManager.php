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
     * @param string $data
     * @return mixed
     */
    public static function make(string $type, string $data)
    {
        if (! array_key_exists($type, self::responses())) {
            throw new \InvalidArgumentException('Response type not found.');
        }

        if ($type === 'notification') {
            $data = str_replace(' ', '+', $data);
            $data = substr($data, -1) !== '>'
                ? $data . '>'
                : $data;
        }

        $response = self::responses()[$type];
        $response->setResponse($data);

        if (self::validMerchantId($response->merchantId())) {
            return $response;
        }else {
            throw new \Exception('Merchant ID did not match on environment credentials.');
        }
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
