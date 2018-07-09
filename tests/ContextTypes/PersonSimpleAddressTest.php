<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class PersonSimpleAddressTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\Person::class;

    protected $attributes = [
        'name' => 'Anonymous tester',
        'mainEntityOfPage' => [
            'url' => 'https://example.com/anonymous.html'
        ],
        'additionalName' => 'phpUnit hacker',
        'address' => 'rue de gauche'

    ];

    /**
     * @test
     */
    public function shouldHaveThingName()
    {
        $context = $this->make();

        $this->assertEquals('Anonymous tester', $context->getProperty('name'));
    }

    /**
     * @test
     */
    public function shouldHaveThingMainEntityOfPageObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'WebPage',
            '@id' => 'https://example.com/anonymous.html',
        ], $context->getProperty('mainEntityOfPage'));
    }

    /**
     * @test
     */
    public function shouldHaveAdditionalName()
    {
        $context = $this->make();

        $this->assertEquals('phpUnit hacker', $context->getProperty('additionalName'));
    }

    /**
     * @test
     */
    public function shouldHaveAddress()
    {
        $context = $this->make();

        $this->assertEquals('rue de gauche', $context->getProperty('address'));
    }


}
