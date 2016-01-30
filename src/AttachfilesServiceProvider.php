<?php

namespace Angrydeer\Attachfiles;

use Illuminate\Support\ServiceProvider;

class AttachfilesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            realpath(__DIR__.'/../resources/migrations') => database_path('migrations'),
        ], 'migrations');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
