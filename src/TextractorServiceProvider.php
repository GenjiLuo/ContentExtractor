<?php

namespace KLP\ContentExtractor;


use Illuminate\Support\ServiceProvider;
/**
 * 
 */
class TextractorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('textractor.php')
        ]);

        $this->mergeConfigFrom(__DIR__ . '/config.php', 'textractor');

    }

    /**
     * Register services
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Textractor::class, function ($app) {
            return new Textractor($app['config']->get('textractor'));
        });


    }
}