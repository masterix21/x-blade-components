<?php

namespace Masterix21\XBladeComponents;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Masterix21\XBladeComponents\View\Components\Form\Field;
use Masterix21\XBladeComponents\View\Components\Form\Validator;

class XBladeComponentsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/x-blade-components'),
            ], 'views');
        }

        $this->loadViewsFrom(__DIR__ .'/../resources/views', 'xbc');

        $this->loadViewComponentsAs('xbc', [
            Field::class,
            Validator::class,
        ]);
    }
}
