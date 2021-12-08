<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/ContactPoint
 */
class ContactPoint extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'telephone' => null,
        'contactType' => null,
        'email' => null,
    ];
}
