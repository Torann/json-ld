<?php

namespace JsonLd\ContextTypes;

class LocalBusiness extends Organization
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $extendedStructure = [
        'openingHours' => null,
        'priceRange' => null,
    ];

    /**
     * Constructor. Merges extendedStructure up
     *
     * @param array $attributes
     * @param array $extendedStructure
     */
    public function __construct(array $attributes, array $extendedStructure = [])
    {
        $place = new Place([]);
        $extendedStructure = array_merge($extendedStructure, $place->structure);

        parent::__construct(
            $attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure)
        );
    }

    /**
     * Set the opening hours of the business.
     *
     * @param array $items
     *
     * @return array
     */
    protected function setOpeningHoursAttribute($items)
    {
        return $items;
    }
}
