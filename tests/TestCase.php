<?php

namespace Masterix21\XBladeComponents\Tests;

use Illuminate\Foundation\Testing\Concerns\InteractsWithSession;
use Illuminate\Http\Concerns\InteractsWithFlashData;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Masterix21\XBladeComponents\XBladeComponentsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Symfony\Component\DomCrawler\Crawler;

class TestCase extends Orchestra
{
    use InteractsWithSession, InteractsWithFlashData;

    public function setUp(): void
    {
        parent::setUp();

        $this->startSession();

        $this->withViewErrors();
    }

    protected function getPackageProviders($app)
    {
        return [
            XBladeComponentsServiceProvider::class,
        ];
    }

    /**
     * @deprecated because already added with Laravel 8.x
     */
    protected function withViewErrors(array $errors = [], $key = 'default')
    {
        $viewErrorBag = new ViewErrorBag();

        $viewErrorBag->put($key, new MessageBag($errors));

        View::share('errors', $viewErrorBag);
    }

    public function htmlCrawlerSelector($html, $selector)
    {
        return (new Crawler($html))->filter($selector);
    }

    public function assertHtmlContainsSelector(string $html, string $selector)
    {
        $this->assertEquals(1, $this->htmlCrawlerSelector($html, $selector)->count());
    }
}
