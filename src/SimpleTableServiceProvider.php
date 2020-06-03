<?php

namespace KornerBI\SimpleTable;

use Illuminate\Support\ServiceProvider;

class SimpleTableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'simple-table');
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'simple-table');

        $this->publishes([
            __DIR__.'/config/simple-table.php' => config_path('simple-table.php')
        ], 'config');
        $this->publishes([
            __DIR__.'/resources/assets' => public_path('simple-table/assets'),
        ], 'public');

    }
}
