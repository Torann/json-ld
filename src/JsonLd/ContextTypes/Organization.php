<?php

namespace JsonLd\ContextTypes;

class Organization extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $extendStructure = [
        'address' => PostalAddress::class,
        'logo' => ImageObject::class,
    ];

    /**
     * Organization constructor. Merges extendStructure up
     *
     * @param array $attributes
     * @param array $extendStructure
     */
    public function __construct(array $attributes, array $extendStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendStructure, $extendStructure));
    }

}