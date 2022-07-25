<?php

namespace Roromedia\Parsedown\Tests;

use PHPUnit\Framework\TestCase;
use Roromedia\Parsedown\Parsedown;
use Symfony\Component\DomCrawler\Crawler;

class MenuTest extends TestCase
{

    public function test_menu_links_are_getting_set()
    {
        $this->assertSame(1, (new Crawler((new Parsedown())->text($this->getMarkdown())))
            ->filter('h1#installation')->count()
        );
    }

    private function getMarkdown(): bool|string
    {
        return file_get_contents(__DIR__ . '/fixtures/README.md');
    }

}
