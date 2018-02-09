<?php

namespace JsonLd\ContextTypes;
class CreativeWorkSeries extends CreativeWork
{
    private $extendedStructure = [
        'endDate' => null,
        'issn' => null,
        'startDate' => null,
    ];

    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure));
    }
}
