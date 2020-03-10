<?php

namespace JsonLd\ContextTypes;

class Product extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'name' => null,
        'description' => null,
        'brand' => null,
        'image' => null,
        'sku' => null,
        'productID' => null,
        'url' => null,
        'review' => Review::class,
        'aggregateRating' => AggregateRating::class,
        'offers' => Offer::class,
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


    /**
     * Set isSimilarTo attributes.
     *
     * @param mixed $values
     *
     * @return array
     */
    protected function setIsSimilarToAttribute($values)
    {
        if (is_array($values)) {
            foreach ($values as $key => $value) {
                $product = new self($value);

                $properties = $product->getProperties();

                unset($properties['@context']);

                $properties = array_filter($properties, 'strlen');

                $values[$key] = $properties;
            }
        }

        return $values;
    }
}
