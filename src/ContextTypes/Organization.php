<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Organization
 */
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
        'telephone' => null,
        'review' => Review::class,
        'aggregateRating' => AggregateRating::class,
        'areaServed' => null,
    ];

}
