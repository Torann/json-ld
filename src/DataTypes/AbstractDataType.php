<?php


namespace JsonLd\DataTypes;


use JsonLd\Contracts\DataTypeInterface;

abstract class AbstractDataType implements DataTypeInterface
{
    protected $attibutes;

    public function __construct($attributes)
    {
        $this->attibutes = $attributes;
    }


    public function getValue()
    {
        return $this->attibutes;
    }
}