<?php namespace CoreProc\Paynamics\Paygate\Laravel\Facades;

class Paygate extends \Illuminate\Support\Facades\Facade
{
    public static function getFacadeAccessor()
    {
        return 'paygate';
    }
}

