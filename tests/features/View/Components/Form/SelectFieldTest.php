<?php
namespace Masterix21\XBladeComponents\Tests\features\View\Components\Form;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Masterix21\XBladeComponents\View\Components\Form\SelectField;

class SelectFieldTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->field = $this->app->make(SelectField::class)
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
            ->with('placeholder', 'Select a value')
            ->with('options', ['one' => 'One label', 'two' => 'Two label'])
            ->with('multiple', false);
    }

    /** @test */
    public function blade_resolve_the_component_name()
    {
        $this->assertStringContainsString(
            SelectField::class,
            Blade::compileString("<x-bc-form:select-field />")
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
    }

    /** @test */
    public function it_show_a_disabled_field()
    {
        $this->field->with('disabled', true);

        $this->assertEquals('true', $this->getFieldContainerElement()->attr('data-disabled'));
    }
}
