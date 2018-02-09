<?php

namespace JsonLd\ContextTypes;
class TVSeason extends CreativeWorkSeason
{
    private $extendedStructure = [
        'countryOfOrigin' => null,
    ];

    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure));
    }
}
