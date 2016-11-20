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
        'email' => null,
        'openingHours' => null,
        'priceRange' => null,
        'image' => ImageObject::class,
        'address' => PostalAddress::class,
        'geo' => GeoCoordinates::class,
        'review' => Review::class,
        'aggregateRating' => AggregateRating::class,
    ];

    /**
     * Set the opening hours of the business.
     *
     * @param  array $items
     * @return array
     */
    protected function setOpeningHoursAttribute($items)
    {
        return $items;
    }
}
