<?php

namespace JsonLd\ContextTypes;

class Event extends AbstractContext
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
     * @param  mixed $values
     * @return array
     */
    protected function setOffersAttribute($values)
    {
        if (is_array($values)) {
            foreach($values as $key => $value) {
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