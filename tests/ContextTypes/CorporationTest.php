<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class CorporationTest extends TestCase
{

    protected $class = \JsonLd\ContextTypes\Corporation::class;

    protected $attributes = [
        'name' => 'Acme Corp.',
        'url' => 'https://example.com',
        'description' => 'Lorem ipsum dolor sit amet',
        'tickerSymbol' => 'ACME',
    ];

    /**
     * @test
     */
    public function shouldHaveUrl()
    {
        $context = $this->make();

        $this->assertEquals('https://example.com', $context->getProperty('url'));
    }
}
