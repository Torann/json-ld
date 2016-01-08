<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class AbstractContextTest extends TestCase
{
    protected $class = \JsonLd\Test\Stubs\ContextStub::class;

    protected $attributes = [
        'sameAs' => 'http://google.com/profile',
        'name' => 'My Profile Page',
    ];

    /**
     * @test
     */
    public function shouldGetProperties()
    {
        $context = $this->make();

        $this->assertEquals(array_merge([
            '@context' => 'http://schema.org',
            '@type' => 'ContextStub',
        ], $this->attributes), $context->getProperties());
    }

    /**
     * @test
     */
    public function shouldSetContext()
    {
        $context = $this->make();

        $properties = $context->getProperties();

        $this->assertEquals('http://schema.org', $properties['@context']);
    }

    /**
     * @test
     */
    public function shouldSetTypeUsingClassName()
    {
        $context = $this->make();

        $properties = $context->getProperties();

        $this->assertEquals('ContextStub', $properties['@type']);
    }
}
