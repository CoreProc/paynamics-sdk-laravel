<?php namespace CoreProc\Paynamics\PayGate\Laravel;

class PayGateFacade extends \Illuminate\Support\Facades\Facade
{
    public static function getFacadeAccessor()
    {
        return 'paygate';
    }

}

