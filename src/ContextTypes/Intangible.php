<?php

namespace JsonLd\ContextTypes;
class Intangible extends Thing
{
    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $extendedStructure));
    }
}
