<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class OrganizationTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\Organization::class;

    protected $attributes = [
        'name' => 'Said Organization',
        'url' => 'https://google.com/organization/22',
        'email' => 'info@nomail.com',
        'address' => [
            'streetAddress' => '112 Apple St.',
            'addressLocality' => 'Hamden',
            'addressRegion' => 'CT',
            'postalCode' => '06514',
        ],
        'logo' => 'https://google.com/thumbnail1.jpg',
        'contactPoint' => [
            'email' => 'support@nomail.com',
            'telephone' => '18009999999',
            'contactType' => 'customer service',
        ],
    ];

    /**
     * @test
     */
    public function test_should_have_properties() {

        $this->assertPropertyEquals('name', 'Said Organization');

        $this->assertPropertyEquals('url', 'https://google.com/organization/22');

        $this->assertPropertyEquals('email', 'info@nomail.com');

        $this->assertPropertyEquals('logo', 'https://google.com/thumbnail1.jpg');
    }

    /**
     * @test
     */
    public function shouldHaveContactPointObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'ContactPoint',
            'email' => 'support@nomail.com',
            'telephone' => '18009999999',
            'contactType' => 'customer service',
        ], $context->getProperty('contactPoint'));
    }

    /**
     * @test
     */
    public function shouldHaveAddressArray()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'PostalAddress',
            'streetAddress' => '112 Apple St.',
            'addressLocality' => 'Hamden',
            'addressRegion' => 'CT',
            'postalCode' => '06514',
        ], $context->getProperty('address'));
    }
}
