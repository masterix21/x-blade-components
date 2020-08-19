<?php
namespace Masterix21\XBladeComponents\Tests\features\View\Components\Form;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Masterix21\XBladeComponents\View\Components\Form\MoneyField;

class MoneyFieldTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->field = $this->app->make(MoneyField::class)
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
            ->with('scale', 2)
            ->with('currency', '$');
    }

    /** @test */
    public function blade_resolve_the_component_name()
    {
        $this->assertStringContainsString(
            MoneyField::class,
            Blade::compileString("<x-bc-form:money-field />")
        );
    }

    /** @test */
    public function it_shown_without_errors()
    {
        $this->assertHtmlContainsSelector(
            $this->field->toHtml(),
            'input#'. $this->field->id
        );
    }

    /** @test */
    public function it_show_the_value()
    {
        $this->field->with('value', 212.87);

        tap($this->getFieldElement(), function ($element) {
            $this->assertEquals(
                212.87,
                $element->attr('value'),
            );

            $this->assertNull($element->attr('readonly'));
        });
    }

    /** @test */
    public function it_show_the_currency()
    {
        $this->assertStringContainsString('$', $this->field->toHtml());
    }
}
