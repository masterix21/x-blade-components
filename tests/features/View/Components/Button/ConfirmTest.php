<?php
namespace Masterix21\XBladeComponents\Tests\features\View\Components\Button;

use Illuminate\Support\Str;
use Masterix21\XBladeComponents\View\Components\Button\Confirm;

class ConfirmTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->field = $this->app->make(Confirm::class)
            ->resolveView();
    }
}
