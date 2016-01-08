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
}