<?php namespace CoreProc\Paynamics\Paygate\Constants;

class TransactionType
{
    const SALE = 'sale';
    const AUTHORIZED = 'authorized';
    const PREAUTHORIZED = 'preauthorized';

    public static function toArray()
    {
        return [
            self::SALE,
            self::AUTHORIZED,
            self::PREAUTHORIZED,
        ];
    }
}