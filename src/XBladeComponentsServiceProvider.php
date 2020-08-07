<?php

namespace Masterix21\XBladeComponents;

use Illuminate\Support\ServiceProvider;
use Masterix21\XBladeComponents\Commands\XBladeComponentsCommand;

class XBladeComponentsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/x-blade-components.php' => config_path('x-blade-components.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/x-blade-components'),
            ], 'views');

            if (! class_exists('CreatePackageTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_x_blade_components_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_x_blade_components_table.php'),
                ], 'migrations');
            }

            $this->commands([
                XBladeComponentsCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'x-blade-components');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/x-blade-components.php', 'x-blade-components');
    }
}
