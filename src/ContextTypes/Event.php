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
        'offers' => [],
        'location' => Place::class,
    ];

    /**
     * Set offers attributes.
     *
     * @param mixed $items
     *
     * @return array
     */
    protected function setOffersAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        // Check if it is an array with one dimension
        if (is_array(reset($items)) === false) {
            return $this->getNestedContext(Offer::class, $items);
        }

        // Process multi dimensional array
        return array_map(function ($item) {
            return $this->getNestedContext(Offer::class, $item);
        }, $items);
    }
}
