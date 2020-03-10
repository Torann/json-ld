<?php

namespace JsonLd\ContextTypes;

class Corporation extends Organization
{
    /**
     * Property structure
     *
     * @var array
     */
    private $extendedStructure = [
        'tickerSymbol' => null,
    ];

    /**
     * Corporation constructor. Merges extendedStructure up
     *
     * @param array $attributes
     * @param array $extendedStructure
     */
    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct(
            $attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure)
        );
    }
}