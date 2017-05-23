<?php namespace CoreProc\Paynamics\PayGate\Laravel;

use CoreProc\Paynamics\PayGate\Client;

class PayGateServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            realpath(__DIR__ . '/../../config/paygate.php') => config_path('paygate.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        if (file_exists(config_path('paygate.php'))) {
            $this->app->bind('paygate', function () {
                return new Client([
                    'merchantId'       => config('paygate.merchant_id'),
                    'merchantKey'      => config('paygate.merchant_key'),
                    'sandbox'          => config('paygate.sandbox'),
                ]);
            });
        }
    }

}