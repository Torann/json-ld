<?php

namespace JsonLd\ContextTypes;

class Event extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $extendedStructure = [
        'name' => null,
        'startDate' => null,
        'endDate' => null,
        'url' => null,
        'offers' => Offer::class,
        'location' => Place::class,
    ];

    /**
     * Constructor. Merges extendedStructure up
     *
     * @param array $attributes
     * @param array $extendedStructure
     */
    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct(
            $attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure)
        );
    }

    /**
     * Set the offers
     *
     * @param array $items
     * @return array
     */
    protected function setOffersAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        //Check if it is an array with one dimension
        if (is_array(reset($items)) === false) {
            return $this->getNestedContext(Offer::class, $items);
        }

        //Process multi dimensional array
        return array_map(function ($item) {
            return $this->getNestedContext(Offer::class, $item);
        }, $items);
    }
}
