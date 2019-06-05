<?php
namespace JsonLd\ContextTypes;
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
        'lowPrice' => null,
        'highPrice' => null,
        'priceCurrency' => null,
        'priceValidUntil' => null,
        'url' => null,
        'itemCondition' => null,
        'availability' => null,
        'eligibleQuantity' => QuantitativeValue::class,
        'category' => null,
        'validFrom' => null,
        'seller' => null,
    ];
}
