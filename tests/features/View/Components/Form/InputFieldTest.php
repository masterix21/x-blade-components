<?php
namespace Masterix21\XBladeComponents\Tests\features\View\Components\Form;

use Illuminate\Support\Str;
use Masterix21\XBladeComponents\Tests\TestCase;
use Masterix21\XBladeComponents\View\Components\Form\InputField;

class InputFieldTest extends TestCase
{

    /**
     * @var \Closure|\Illuminate\View\View|string
     */
    private $field;

    public function setUp(): void
    {
        parent::setUp();

        $this->field = $this->app->make(InputField::class)
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
        $this->assertStringContainsString(
            "input id=\"{$this->field->id}\"",
            $this->field->toHtml()
        );
    }

    /** @test */
    public function it_show_the_value()
    {
        $this->field->with('value', 'Hello this is my value');

        $this->assertStringContainsString(
            'value="Hello this is my value"',
            $this->field->toHtml()
        );
    }
}
