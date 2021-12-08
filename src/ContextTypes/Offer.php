<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Offer
 */
class Offer extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'itemOffered' => Product::class,
        'price' => null,
        'priceCurrency' => null,
        'priceValidUntil' => null,
        'itemCondition' => null,
        'availability' => null,
        'eligibleQuantity' => QuantitativeValue::class,
        'category' => null,
        'validFrom' => null,
        'seller' => Organization::class,
    ];

}
