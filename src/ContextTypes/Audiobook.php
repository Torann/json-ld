<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Audiobook
 */
class Audiobook extends AudioObject
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'duration' => Duration::class,
        'readBy' => Person::class,
    ];

}