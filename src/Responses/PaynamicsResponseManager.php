<?php

namespace Coreproc\PaynamicsSdk\Responses;

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

        return self::responses()[$type];
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
        ];
    }
}
