<?php

namespace JsonLd\ContextTypes;

class Corporation extends Organization
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $extendStructure = [
        'tickerSymbol' => null,
    ];

    /**
     * Corporation constructor. Merges extendStructure up
     *
     * @param array $attributes
     * @param array $extendStructure
     */
    public function __construct(array $attributes, array $extendStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendStructure, $extendStructure));
    }

}