<?php
namespace Masterix21\XBladeComponents\Tests\features\View\Components\Button;

use Illuminate\Support\Facades\Blade;
use Illuminate\View\View;
use Masterix21\XBladeComponents\Tests\TestCase;
use Masterix21\XBladeComponents\View\Components\Button\Confirm;

class ConfirmTest extends TestCase
{
    private View $button;

    public function setUp(): void
    {
        parent::setUp();

        $this->button = $this->app->make(Confirm::class)->resolveView();
    }

    /** @test */
    public function blade_resolve_the_component_name()
    {
        $this->assertStringContainsString(
            Confirm::class,
            Blade::compileString("<x-bc-button:confirm />")
        );
    }
}
