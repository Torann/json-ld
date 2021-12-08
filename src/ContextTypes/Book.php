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
    protected $structure = [
        'abridged' => null,
        'bookEdition' => null,
        'bookFormat' => BookFormatType::class,
        'illustrator' => Person::class,
        'isbn' => null,
        'numberOfPages' => null,
    ];

}