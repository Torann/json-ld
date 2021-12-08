<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Event
 */
class Event extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'startDate' => null,
        'endDate' => null,
        'offers' => Offer::class,
        'location' => Place::class,
    ];

}
