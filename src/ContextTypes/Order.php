<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Order
 */
class Order extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'merchant' => Organization::class, //Not an official attribute
        'orderNumber' => null,
        'orderStatus' => null,
        'priceCurrency' => null, //Not an official attribute
        'price' => null, //Not an official attribute
        'acceptedOffer' => Offer::class,
        'priceSpecification.name' => null //Not an official attribute
    ];
}
