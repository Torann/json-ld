<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Place
 */
class Place extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'address' => PostalAddress::class,
        'review' => Review::class,
        'aggregateRating' => AggregateRating::class,
        'geo' => GeoCoordinates::class,
    ];

}
