<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Product
 */
class Product extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'brand' => null,
        'sku' => null,
        'productID' => null,
        'review' => Review::class,
        'aggregateRating' => AggregateRating::class,
        'offers' => [Offer::class, AggregateOffer::class],
        'gtin8' => null,
        'gtin13' => null,
        'gtin14' => null,
        'mpn' => null,
        'category' => null,
        'model' => null,
        'isSimilarTo' => Product::class,
        'height' => QuantitativeValue::class,
        'width' => QuantitativeValue::class,
        'weight' => QuantitativeValue::class,
    ];

}
