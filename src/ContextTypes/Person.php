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
    protected $structure = [
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
     * Set the address
     *
     * @param mixed $items
     *
     * @return mixed
     */
    protected function setAddressAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        return $this->getNestedContext(PostalAddress::class, $items);
    }
}
