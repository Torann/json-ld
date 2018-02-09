<?php

namespace JsonLd\ContextTypes;
class Service extends Intangible
{
    private $extendedStructure = [
        'aggregateRating' => null,
        'areaServed' => null,
        'audience' => null,
        'availableChannel' => null,
        'award' => null,
        'brand' => null,
        'broker' => null,
        'category' => null,
        'hasOfferCatalog' => null,
        'hoursAvailable' => null,
        'isRelatedTo' => null,
        'isSimilarTo' => null,
        'logo' => null,
        'offers' => null,
        'provider' => null,
        'providerMobility' => null,
        'review' => null,
        'serviceOutput' => null,
        'serviceType' => null,
        'termsOfService' => null,
    ];

    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure));
    }
}
