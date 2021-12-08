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
    protected $structure = [
        'caption' => MediaObject::class,
        'transcript' => null,
        'duration' => Duration::class,
        'readBy' => Person::class,
    ];

}