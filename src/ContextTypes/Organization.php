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
    ];

    /**
     * Organization constructor. Merges extendedStructure up
     *
     * @param array $attributes
     * @param array $extendedStructure
     */
    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure));
    }

}
