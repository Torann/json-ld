<?php

namespace JsonLd\ContextTypes;

/**
 * Book format to meet schema requirements to make JSON-LD
 *
 * https://jsonld.com/book/
 * https://schema.org/Book
 */
class Book extends CreativeWork
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $extendedStructure = [
        'abridged' => null,
        'bookEdition' => null,
        'bookFormat' => BookFormatType::class,
        'illustrator' => Person::class,
        'isbn' => null,
        'numberOfPages' => null,
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