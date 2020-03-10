<?php

namespace JsonLd\ContextTypes;

class Organization extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    private $extendedStructure = [
        'address' => PostalAddress::class,
        'logo' => ImageObject::class,
        'contactPoint' => ContactPoint::class,
        'email' => null,
    ];

    /**
     * Organization constructor. Merges extendedStructure up
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
     * Set the contactPoints
     *
     * @param array $items
     *
     * @return array
     */
    protected function setContactPointAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        //Check if it is an array with one dimension
        if (is_array(reset($items)) === false) {
            return $this->getNestedContext(ContactPoint::class, $items);
        }

        //Process multi dimensional array
        return array_map(function ($item) {
            return $this->getNestedContext(ContactPoint::class, $item);
        }, $items);
    }
}
