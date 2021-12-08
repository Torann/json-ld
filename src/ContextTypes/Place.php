<?php

namespace JsonLd\ContextTypes;

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
    ];

}
