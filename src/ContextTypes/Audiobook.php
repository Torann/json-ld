<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/BookFormatType
 */
class Audiobook extends Book
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $extendedStructure = [
        'caption' => MediaObject::class,
        'transcript' => null,
        'duration' => Duration::class,
        'readBy' => Person::class,
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