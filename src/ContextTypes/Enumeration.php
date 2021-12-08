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
    protected $structure = [
        'supersededBy' => Enumeration::class,
    ];

}