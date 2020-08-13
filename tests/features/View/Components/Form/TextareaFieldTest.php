<?php
namespace Masterix21\XBladeComponents\Tests\features\View\Components\Form;

use Illuminate\Support\Str;
use Masterix21\XBladeComponents\View\Components\Form\TextareaField;

class TextareaFieldTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->field = $this->app->make(TextareaField::class)
            ->resolveView()
            ->with('id', Str::uuid())
            ->with('name', 'test-input-label')
            ->with('label', 'Test label')
            ->with('value', null)
            ->with('errorBag', null)
            ->with('slot', null)
            ->with('readOnly', false)
            ->with('disabled', false)
            ->with('attributes', null);
    }

    /** @test */
    public function it_shown_without_errors()
    {
        $this->assertHtmlContainsSelector(
            $this->field->toHtml(),
            'textarea#'. $this->field->id
        );
    }

    /** @test */
    public function it_show_the_value()
    {
        $this->field->with('value', 'Hello this is my value');

        $this->assertEquals('Hello this is my value', $this->getFieldElement()->text());
    }
}
