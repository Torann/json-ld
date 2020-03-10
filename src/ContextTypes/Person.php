<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Person
 */
class Person extends Thing
{
    /**
     * Property structure (alphabetical order)
     *
     * @var array
     */
    protected $extendedStructure = [
        'additionalName' => null,
        'address' => null, // PostalAddress or Text
        'affiliation' => null,
        'alumniOf' => null,
        'award' => null,
        'birthDate' => null,
        'birthPlace' => Place::class,
        'brand' => null,
        'children' => Person::class,
        'colleague' => null,
        'contactPoint' => null,
        'deathDate' => null,
        'deathPlace' => Place::class,
        'duns' => null,
        'email' => null,
        'familyName' => null,
        'faxNumber' => null,
        'follows' => Person::class,
        'homeLocation' => Place::class,
        'givenName' => null,
        'jobTitle' => null,
        'parent' => Person::class,
        'telephone' => null,
        'workLocation' => Place::class,
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

    /**
     * Set the address
     *
     * @param array $items
     *
     * @return array
     */
    protected function setAddressAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        return $this->getNestedContext(PostalAddress::class, $items);
    }
}
