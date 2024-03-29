<?php

namespace Coreproc\PaynamicsSdk\Services;

class PaynamicsServiceManager
{
    /**
     * Crate new instance of service type supplied
     *
     * @param string $service
     * @return PaymentService
     */
    public static function make(string $service): PaymentService
    {
        if (! array_key_exists($service, self::services())) {
            throw new \InvalidArgumentException('Service supplied does not exist.');
        }

        return self::services()[$service];
    }

    /**
     * list of all services
     *
     * @return array
     */
    public static function services(): array
    {
        return [
            'rebill' => RebillService::make(),
            'payment' => PaymentService::make(),
            'refund' => RefundService::make(),
            'query' => QueryService::make(),
            'dispute-query' => DisputeQueryService::make(),
        ];
    }
}
