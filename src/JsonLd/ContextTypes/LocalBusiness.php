<?php

namespace JsonLd\ContextTypes;

class LocalBusiness extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'name' => null,
        'description' => null,
        'telephone' => null,
        'openingHours' => null,
        'address' => PostalAddress::class,
        'geo' => GeoCoordinates::class,
    ];
}