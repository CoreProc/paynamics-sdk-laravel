<?php

namespace Coreproc\PaynamicsSdk\Services;

class ServiceManager
{
    /**
     * Crate new instance of
     *
     * @param string $service
     * @return ServiceManager
     */
    public static function make(string $service): ServiceManager
    {
        if (! array_key_exists($service, self::services())) {
            throw new \InvalidArgumentException('Service supplied does not exist.');
        }

        return self::services()->$service;
    }

    /**
     * list of all services
     *
     * @return array
     */
    public static function services(): array
    {
        return [
            'payment' => PaymentService::make(),
        ];
    }
}