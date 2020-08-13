<?php
namespace Masterix21\XBladeComponents\Tests\features\View\Components\Form;

use Illuminate\Support\Str;
use Masterix21\XBladeComponents\View\Components\Form\NumberField;

class NumberFieldTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->field = $this->app->make(NumberField::class)
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
            ->with('scale', 0);
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
        $this->field->with('value', 21287);

        tap($this->getFieldElement(), function ($element) {
            $this->assertEquals(
                21287,
                $element->attr('value'),
            );

            $this->assertNull($element->attr('readonly'));
        });
    }
}
