<?php

namespace Coreproc\PaynamicsSdk\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Coreproc\PaynamicsSdk\PaynamicsClient;
use Coreproc\PaynamicsSdk\HsbcClient;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__.'/../../config/paynamics.php';
        $this->publishes([$configPath => config_path('paynamics.php')], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/paynamics.php', 'paynamics');

        $this->app->singleton(PaynamicsClient::class, function ($app) {
            return new PaynamicsClient([
                'merchant_id' => config('paynamics.merchant_id'),
                'merchant_key' => config('paynamics.merchant_key'),
                'environment' => config('paynamics.environment'),
                'endpoint' => [
                    'sandbox' => config('paynamics.endpoint.sandbox'),
                    'production' => config('paynamics.endpoint.production'),
                ],
            ]);
        });

        $this->app->singleton(HsbcClient::class, function ($app) {
            return new HsbcClient([
                'hsbc' => config('paynamics.hsbc'),
            ]);
        });
    }
}
