<?php

namespace JsonLd\Test;

use Mockery;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{
    /**
     * @var string
     */
    protected $class;

    /**
     * @var array
     */
    protected $attributes = [];

    public function tearDown(): void
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

        $this->assertEquals(
            $expectedValue,
            $context->getProperty($property),
            "asserting '{$this->class}' property '{$property}'"
        );
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
                $this->assertStringContainsString(json_encode($k), $html);
                $this->assertStringContainsString(json_encode($v), $html);
            }
        }
    }
}