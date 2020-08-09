<?php

namespace Masterix21\XBladeComponents;

use Illuminate\Support\ServiceProvider;
use Masterix21\XBladeComponents\View\Components\Form\ToggleField;
use Masterix21\XBladeComponents\View\Components\Form\Field;
use Masterix21\XBladeComponents\View\Components\Form\InputField;
use Masterix21\XBladeComponents\View\Components\Form\MoneyField;
use Masterix21\XBladeComponents\View\Components\Form\NumberField;
use Masterix21\XBladeComponents\View\Components\Form\PasswordField;
use Masterix21\XBladeComponents\View\Components\Form\TextareaField;

class XBladeComponentsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/x-blade-components.php' => config_path('x-blade-components.php'),
            ], 'config');

            /*
            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/x-blade-components'),
            ], 'views');
            */
        }

        $this->loadViewsFrom(__DIR__ .'/../resources/views/components', 'bc');

        $this->loadViewComponentsAs('bc', [
            Field::class,
            InputField::class,
            TextareaField::class,
            PasswordField::class,
            NumberField::class,
            MoneyField::class,
            ToggleField::class,
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ .'/../config/x-blade-components.php', 'x-blade-components');
    }
}
