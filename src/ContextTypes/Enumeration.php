<?php

namespace JsonLd\ContextTypes;

/**
 * Lists or enumerations—for example, a list of cuisines or music genres, etc.
 *
 * https://schema.org/Enumeration
 */
class Enumeration extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $extendedStructure = [
        'supersededBy' => Enumeration::class,
    ];

    /**
     * Constructor. Merges extendedStructure up
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