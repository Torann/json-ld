<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class ContactPointTest extends TestCase
{

    protected $class = \JsonLd\ContextTypes\ContactPoint::class;

    protected $attributes = [
        'telephone' => '18009999999',
        'contactType' => 'customer service',
    ];

    /**
     * @test
     */
    public function shouldHaveTelephone()
    {
        $context = $this->make();

        $this->assertEquals('18009999999', $context->getProperty('telephone'));
    }

    /**
     * @test
     */
    public function shouldHaveContactType()
    {
        $context = $this->make();

        $this->assertEquals('customer service', $context->getProperty('contactType'));
    }

}
