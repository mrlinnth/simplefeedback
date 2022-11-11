<?php

namespace Mrlinnth\Simplefeedback;

use Illuminate\Support\ServiceProvider;

class SimplefeedbackServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'mrlinnth');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'mrlinnth');
        $this->loadViewComponentsAs('mrlinnth', [Alert::class]);
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/simplefeedback.php', 'simplefeedback');

        // Register the service the package provides.
        $this->app->singleton('simplefeedback', function ($app) {
            return new Simplefeedback();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['simplefeedback'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/simplefeedback.php' => config_path('simplefeedback.php'),
        ], 'simplefeedback.config');

        // Publishing the migrations.
        /*if (! class_exists('CreateSimplefeedbackTable')) {
            $this->publishes([
            __DIR__ . '/../database/migrations/create_simplefeedback_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_simplefeedback_table.php'),
            // you can add any number of migrations here
            ], 'migrations');
        }*/

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/mrlinnth'),
        ], 'simplefeedback.views');*/

        // Publishing view components.
        // $this->publishes([
        //     __DIR__.'/../src/Components/' => app_path('View/Components'),
        // ], 'simplefeedback.view-components');

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/mrlinnth'),
        ], 'simplefeedback.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/mrlinnth'),
        ], 'simplefeedback.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
