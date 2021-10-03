<?php

namespace robiokidenis\Fcm;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use robiokidenis\Fcm\Fcm;
use Laravel\Lumen\Application as LumenApplication;

/**
 * Class FcmServiceProvider
 * @package robiokidenis\Fcm\Providers
 */
class FcmServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/config/rod-fcm.php' => config_path('rod-fcm.php'),
            ]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('rod-fcm');
        }
    }

    public function register()
    {
        $this->app->bind('fcm', function ($app) {
            return new Fcm(
                config('rod-fcm.server_key')
            );
        });
    }
}
