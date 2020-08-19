<?php
namespace Masterix21\XBladeComponents\Tests\features\View\Components\Form;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Masterix21\XBladeComponents\View\Components\Form\ToggleField;

class ToggleFieldTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->field = $this->app->make(ToggleField::class)
            ->resolveView()
            ->with('id', Str::uuid())
            ->with('name', 'test-input-label')
            ->with('label', 'Test label')
            ->with('value', null)
            ->with('errorBag', null)
            ->with('slot', null)
            ->with('readOnly', false)
            ->with('disabled', false)
            ->with('attributes', null)
            ->with('trueValue', true)
            ->with('falseValue', false);
    }

    /** @test */
    public function blade_resolve_the_component_name()
    {
        $this->assertStringContainsString(
            ToggleField::class,
            Blade::compileString("<x-bc-form:toggle-field />")
        );
    }

    /** @test */
    public function it_shown_without_errors()
    {
        $this->assertHtmlContainsSelector(
            $this->field->toHtml(),
            '#'. $this->field->id
        );
    }

    /** @test */
    public function it_show_a_readonly_field()
    {
        $this->field->with('readOnly', true);

        $this->assertEquals('true', $this->getFieldContainerElement()->attr('data-readonly'));
        $this->assertStringContainsString("x-on:click=\"isOn = false\"", $this->field->toHtml());
    }

    /** @test */
    public function it_show_a_disabled_field()
    {
        $this->field->with('disabled', true);

        $this->assertEquals('true', $this->getFieldContainerElement()->attr('data-disabled'));
        $this->assertStringContainsString("x-on:click=\"isOn = false\"", $this->field->toHtml());
    }
}
