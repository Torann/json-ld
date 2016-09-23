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
        'address' => [
            'streetAddress' => '1785 East Sahara Avenue, Suite 490-423',
            'addressLocality' => 'Las Vegas',
            'addressRegion' => 'NV',
            'postalCode' => '89104',
        ],
    ];

    /**
     * @test
     */
    public function shouldHaveUrl()
    {
        $context = $this->make();

        $this->assertEquals('https://example.com', $context->getProperty('url'));
        $this->assertEquals('PostalAddress', $context->getProperty('address')['@type']);
    }
}
