<?php
namespace Masterix21\XBladeComponents\Tests\features\View\Components\Form;

use Illuminate\Support\Facades\Blade;
use Masterix21\XBladeComponents\Tests\TestCase;
use Masterix21\XBladeComponents\View\Components\Form\Field;

class FieldTest extends TestCase
{
    protected $field;

    public function setUp(): void
    {
        parent::setUp();

        $this->field = $this->app->make(Field::class)
            ->resolveView()
            ->with('label', 'Test label')
            ->with('errorBag', null)
            ->with('slot', null);
    }

    /** @test */
    public function it_works_without_errors_using_no_arguments()
    {
        $compiled = Blade::compileString("<x-bc-form:field />");

        $this->assertStringContainsString(Field::class, $compiled);
        $this->assertStringContainsString("withName('bc-form:field')", $compiled);
    }

    /** @test */
    public function it_show_label()
    {
        $html = $this->field->toHtml();

        $this->assertStringContainsString('Test label', $html);
    }

    /** @test */
    public function it_show_errors()
    {
        $this->withViewErrors(['test' => 'Field required']);

        $html = $this->field
            ->with('label', 'Test label with errors')
            ->with('errorBag', 'test')
            ->toHtml();

        $this->assertStringContainsString('Test label with errors', $html);
        $this->assertStringContainsString('<p class="mt-1 text-xs text-red-600">Field required</p>', $html);
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
}
