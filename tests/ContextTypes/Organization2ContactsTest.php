<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class Organization2ContactsTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\Organization::class;

    protected $attributes = [
        'name' => 'Said Organization',
        'url' => 'https://google.com/organization/22',
        'address' => [
            'streetAddress' => '112 Apple St.',
            'addressLocality' => 'Hamden',
            'addressRegion' => 'CT',
            'postalCode' => '06514',
        ],
        'logo' => 'https://google.com/thumbnail1.jpg',
        'contactPoint' => [
            ['@type' => 'contactPoint',
            'telephone' => '18008888888',
            'contactType' => 'customer service',
            ],
            ['@type' => 'contactPoint',
            'telephone' => '18009999999',
            'contactType' => 'sales',
            ],
        ],
    ];

    /**
     * @test
     */
    public function shouldHave2ContactsArray()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'ContactPoint',
            'telephone' => '18008888888',
            'contactType' => 'customer service',
        ], $context->getProperty('contactPoint')[0]);
        $this->assertEquals([
            '@type' => 'ContactPoint',
            'telephone' => '18009999999',
            'contactType' => 'sales',
        ], $context->getProperty('contactPoint')[1]);
    }
}
