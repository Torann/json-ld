<?php

namespace JsonLd\ContextTypes;

class Organization extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'address' => PostalAddress::class,
        'logo' => ImageObject::class,
        'contactPoint' => ContactPoint::class,
        'email' => null,
        'hasPOS' => Place::class,
    ];

    /**
     * Set the contactPoints
     *
     * @param mixed $items
     *
     * @return array
     */
    protected function setContactPointAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        // Check if it is an array with one dimension
        if (is_array(reset($items)) === false) {
            return $this->getNestedContext(ContactPoint::class, $items);
        }

        //Process multi dimensional array
        return array_map(function ($item) {
            return $this->getNestedContext(ContactPoint::class, $item);
        }, $items);
    }
    /**
     * Set the hasPOS
     *
     * @param array $items
     * @return array
     */
    protected function setHasPOSAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        // Check if it is an array with one dimension
        if (is_array(reset($items)) === false) {
            return $this->getNestedContext(Place::class, $items);
        }

        // Process multi dimensional array
        return array_map(function ($item) {
            return $this->getNestedContext(Place::class, $item);
        }, $items);
    }
}
