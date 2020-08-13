<?php

namespace Masterix21\XBladeComponents\Tests\features\View\Components\Form;


use Illuminate\View\View;
use Symfony\Component\DomCrawler\Crawler;

class TestCase extends \Masterix21\XBladeComponents\Tests\TestCase
{
    /** @var View */
    protected $field;

    protected function getFieldContainerElement() : Crawler
    {
        return $this->htmlCrawlerSelector(
            $this->field->toHtml(),
            '#container-'. $this->field->id
        );
    }

    protected function getFieldElement() : Crawler
    {
        return $this->htmlCrawlerSelector(
            $this->field->toHtml(),
            '#'. $this->field->id
        );
    }

    /** @test */
    public function it_show_errors()
    {
        $this->withViewErrors(['test' => 'Field required']);

        $html = $this->field
            ->with('errorBag', 'test')
            ->toHtml();

        $this->assertStringContainsString('<p class="mt-1 text-xs text-red-600">Field required</p>', $html);
    }

    /** @test */
    public function it_show_prepends_and_appends()
    {
        $this->field
            ->with('prepend', 'This is the prepended value')
            ->with('append', 'This is the appended value');

        tap($this->field->toHtml(), function (string $html) {
            $this->assertStringContainsString('This is the prepended value', $html);
            $this->assertStringContainsString('This is the appended value', $html);
        });
    }

    /** @test */
    public function it_show_a_readonly_field()
    {
        $this->field
            ->with('value', 'Readonly value')
            ->with('readOnly', true);

        $this->assertEquals(
            'readonly',
            $this->getFieldElement()->attr('readonly')
        );
    }

    /** @test */
    public function it_show_a_disabled_field()
    {
        $this->field
            ->with('value', 'Readonly value')
            ->with('disabled', true);

        $this->assertEquals(
            'disabled',
            $this->getFieldElement()->attr('disabled')
        );
    }
}
