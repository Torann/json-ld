<?php

namespace JsonLd\ContextTypes;

class GeoCoordinates extends AbstractContext
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