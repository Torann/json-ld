<?php

namespace JsonLd\Test;

use Mockery;
use PHPUnit_Framework_TestCase;

class TestCase extends PHPUnit_Framework_TestCase
{
    protected $class;

    protected $attributes = [];

    public function tearDown()
    {
        Mockery::close();
    }

    protected function make()
    {
        return new $this->class($this->attributes);
    }

    protected function assertPropertyEquals($property, $expectedValue)
    {
        $context = $this->make();

        $assertMessage = 'asserting \''.$this->class.'\' property \''.$property.'\'';
        $this->assertEquals($expectedValue, $context->getProperty($property), $assertMessage);
    }


    protected function makeJsonLdContext()
    {
        return \JsonLd\Context::create($this->class, $this->attributes);
    }

    public function testGenerateLdJson()
    {
        $context = $this->make();
        $jsonLdContext = $this->makeJsonLdContext();

        $html = $jsonLdContext->generate();
        $properties = $context->getProperties();

        $this->assertNotNull($html);
        foreach ($properties as $k => $v) {
            if ($v != null) {
                $this->assertContains(json_encode($k), $html);
                $this->assertContains(json_encode($v), $html);
            }
        }
    }
}