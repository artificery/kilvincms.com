<?php

namespace App\Providers;

use Parsedown;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        define('KILVIN_DOCS_PACKAGE_PATH', realpath(__DIR__.'/../../vendor/artificery/kilvin-docs').DIRECTORY_SEPARATOR);

        $this->app->singleton('parsedown', function () {
            return Parsedown::instance();
        });
    }
}
