<?php

namespace JsonLd\ContextTypes;

class Order extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'merchant' => Organization::class,
        'orderNumber' => null,
        'orderStatus' => null,
        'priceCurrency' => null,
        'price' => null,
        'acceptedOffer' => Offer::class,
        'url' => null,
        'priceSpecification.name' => null
    ];
}
