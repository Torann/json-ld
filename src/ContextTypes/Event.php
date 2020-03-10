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
        'offers' => [],
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
     * Set offers attributes.
     *
     * @param mixed $values
     *
     * @return array
     */
    protected function setOffersAttribute($values)
    {
        if (is_array($values)) {
            foreach ($values as $key => $value) {
                $values[$key] = $this->mapProperty([
                    'name' => '',
                    'price' => '',
                    'url' => '',
                ], $value);
            }
        }

        return $values;
    }
}
