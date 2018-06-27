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
        'actionableFeedbackPolicy' => null,
        'address' => PostalAddress::class,
        'aggregateRating' => null,
        'alumni' => null,
        'areaServed' => null,
        'award' => null,
        'brand' => null,
        'contactPoint' => ContactPoint::class,
        'correctionsPolicy' => null,
        'department' => null,
        'dissolutionDate' => null,
        'diversityPolicy' => null,
        'duns' => null,
        'email' => null,
        'employee' => null,
        'ethicsPolicy' => null,
        'event' => null,
        'faxNumber' => null,
        'founder' => null,
        'foundingDate' => null,
        'foundingLocation' => null,
        'funder' => null,
        'globalLocationNumber' => null,
        'hasOfferCatalog' => null,
        'hasPOS' => null,
        'isicV4' => null,
        'legalName' => null,
        'leiCode' => null,
        'location' => null,
        'logo' => ImageObject::class,
        'makesOffer' => null,
        'member' => null,
        'memberOf' => null,
        'naics' => null,
        'numberOfEmployees' => null,
        'owns' => null,
        'parentOrganization' => null,
        'publishingPrinciples' => null,
        'review' => null,
        'seeks' => null,
        'sponsor' => null,
        'subOrganization' => null,
        'taxID' => null,
        'telephone' => null,
        'unnamedSourcesPolicy' => null,
        'vatID' => null,
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
