<?php
namespace Masterix21\XBladeComponents\Tests\features\View\Components\Form;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Masterix21\XBladeComponents\View\Components\Form\Field;

class FieldTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->field = $this->app->make(Field::class)
            ->resolveView()
            ->with('id', Str::uuid())
            ->with('label', 'Test label')
            ->with('hint', null)
            ->with('help', null)
            ->with('placeholder', null)
            ->with('errorBag', null)
            ->with('slot', null)
            ->with('hideContainerBorder', false);
    }

    /** @test */
    public function blade_resolve_the_component_name()
    {
        $this->assertStringContainsString(
            Field::class,
            Blade::compileString("<x-bc-form:field />")
        );
    }

    /** @test */
    public function it_show_label()
    {
        $html = $this->field->toHtml();

        $this->assertStringContainsString('Test label', $html);
    }

    /** @test */
    public function it_show_the_slot()
    {
        $html = $this->field
            ->with('label', 'Test label with slot')
            ->with('slot', 'This is the slot')
            ->toHtml();

        $this->assertStringContainsString('Test label with slot', $html);
        $this->assertStringContainsString('This is the slot', $html);
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
