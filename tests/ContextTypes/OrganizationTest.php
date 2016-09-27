<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class OrganizationTest extends TestCase
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
            'telephone' => '18009999999',
            'contactType' => 'customer service',
        ],
    ];

    /**
     * @test
     */
    public function shouldHaveContactPointObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'ContactPoint',
            'telephone' => '18009999999',
            'contactType' => 'customer service',
        ], $context->getProperty('contactPoint'));
    }

}
