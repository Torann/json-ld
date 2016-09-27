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
        'url' => null,
        'description' => null,
        'address' => PostalAddress::class,
        'logo' => ImageObject::class,
        'contactPoint' => ContactPoint::class,
    ];
}
