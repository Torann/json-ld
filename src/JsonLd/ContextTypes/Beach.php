<?php

namespace JsonLd\ContextTypes;

class Beach extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'name' => null,
        'openingHours' => null,
        'photo' =>null,
        'address' => PostalAddress::class,
        'geo' => GeoCoordinates::class,
        'review' => Review::class,
        'aggregateRating' => AggregateRating::class,
    ];
}
