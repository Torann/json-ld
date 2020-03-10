<?php

namespace JsonLd\ContextTypes;

class Place extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $extendedStructure = [
        'address' => PostalAddress::class,
        'review' => Review::class,
        'aggregateRating' => AggregateRating::class,
    ];

    /**
     * Constructor. Merges extendedStructure up
     *
     * @param array $attributes
     * @param array $extendedStructure
     */
    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure));
    }

}
