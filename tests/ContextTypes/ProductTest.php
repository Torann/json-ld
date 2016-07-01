<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class ProductTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\Product::class;

    protected $attributes = [
        'name' => 'Executive Anvil',
        'category' => 'Droppables / Anvils',
        'model' => 'Acme Exec. Anvil',
        'image' => 'http://www.example.com/anvil_executive.jpg',
        'description' => 'Sleeker than ACME\'s Classic Anvil, the Executive Anvil is perfect for the business traveler looking for something to drop from a height.',
        'sku' => '925872',
        'brand' => 'Acme Inc.',
        'aggregateRating' => [
            'ratingValue' => '4.4',
            'reviewCount' => '89',
        ],
        'offers' => [
            'price' => '119.99',
            'priceCurrency' => 'USD',
            'priceValidUntil' => '2020-11-05',
            'itemCondition' => 'http://schema.org/UsedCondition',
            'availability' => 'http://schema.org/InStock',
        ],
    ];

    /**
     * @test
     */
    public function shouldHaveAggregateRatingObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'AggregateRating',
            'ratingValue' => '4.4',
            'reviewCount' => '89',
        ], $context->getProperty('aggregateRating'));
    }

    /**
     * @test
     */
    public function shouldHaveOfferObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'Offer',
            'priceCurrency' => 'USD',
            'price' => '119.99',
            'priceValidUntil' => '2020-11-05',
            'itemCondition' => 'http://schema.org/UsedCondition',
            'availability' => 'http://schema.org/InStock'
        ], $context->getProperty('offers'));
    }

}
