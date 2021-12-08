<?php

namespace JsonLd\ContextTypes;

class Event extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'name' => null,
        'startDate' => null,
        'endDate' => null,
        'url' => null,
        'offers' => Offer::class,
        'location' => Place::class,
    ];

}
