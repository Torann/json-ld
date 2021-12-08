<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/LocalBusiness
 */
class LocalBusiness extends Organization
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'openingHours' => null,
        'priceRange' => null,
        'geo' => GeoCoordinates::class, //Property of Place
        'hasMap' => null, //Property of Place
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
