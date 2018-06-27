<?php

namespace JsonLd\ContextTypes;

class Person extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'givenName' => null,
        'familyName' => null,
        'email' => null,
        'image' => null,
        'jobTitle' => null,
        'telephone' => null,
    ];
}
