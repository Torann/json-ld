<?php

namespace JsonLd\Test;

use Mockery;
use PHPUnit_Framework_TestCase;

class ContextTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldGetEventProperties()
    {
        $context = \JsonLd\Context::create('event', ['name' => 'Foo Bar']);

        $this->assertEquals([
            '@context' => 'http://schema.org',
            '@type' => 'Event',
            'name' => 'Foo Bar',
        ], $context->getProperties());
    }

    /**
     * @test
     */
    public function shouldGenerateEventScriptTag()
    {
        $context = \JsonLd\Context::create('event', ['name' => 'Foo Bar']);

        $this->assertEquals('<script type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"Event","name":"Foo Bar"}</script>', $context->generate());
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
