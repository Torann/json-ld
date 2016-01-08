<?php

namespace JsonLd\ContextTypes;

class Organization extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'name' => null,
        'address' => PostalAddress::class,
        'logo' => ImageObject::class,
    ];
}