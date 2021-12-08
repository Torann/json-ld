<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/GeoCoordinates
 */
class GeoCoordinates extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'latitude' => '',
        'longitude' => '',
    ];
}