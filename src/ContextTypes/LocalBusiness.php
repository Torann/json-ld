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
        'image' => null,
        'telephone' => null,
        'email' => null,
        'openingHours' => null,
        'address' => PostalAddress::class,
        'geo' => GeoCoordinates::class,
        'review' => Review::class,
        'aggregateRating' => AggregateRating::class,
        'url' => null,
        'priceRange' => null,
        'areaServed' => null,
        'hasMap' => null,
    ];

    /**
     * Set the opening hours of the business.
     *
     * @param mixed $items
     *
     * @return mixed
     */
    protected function setOpeningHoursAttribute($items)
    {
        return $items;
    }
}
