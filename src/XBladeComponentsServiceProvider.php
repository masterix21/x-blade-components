<?php

namespace Masterix21\XBladeComponents;

use Illuminate\Support\ServiceProvider;
use Masterix21\XBladeComponents\View\Components\Form\Field;
use Masterix21\XBladeComponents\View\Components\Form\InputField;
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

        $this->loadViewsFrom(__DIR__ .'/../resources/views/components', 'bc');

        $this->loadViewComponentsAs('bc', [
            Field::class,
            InputField::class,
        ]);
    }
}
