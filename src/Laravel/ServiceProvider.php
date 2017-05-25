<?php namespace CoreProc\Paynamics\Paygate\Laravel;

use CoreProc\Paynamics\Paygate\Client;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
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
            $this->app->singleton('paygate', function ($app) {
                $config = $app['config']->get('paygate');

                return new Client([
                    'merchant_id'     => $config['merchant_id'],
                    'merchant_key'    => $config['merchant_key'],
                    'sandbox'         => $config['sandbox'],
                    'sandbox_url'     => $config['url.sandbox'],
                    'production_url'  => $config['url.production'],
                ]);
            });
        }
    }

}