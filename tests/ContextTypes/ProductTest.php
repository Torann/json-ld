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
        'description' => 'Sleeker than ACME\u0027s Classic Anvil, the Executive Anvil is perfect for the business traveler looking for something to drop from a height.',
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
        'isSimilarTo' => [
            [
                '@type' => 'Product',
                'name' => 'Lorem ipsum dolor sit amet.',
                'category' => 'Vestibulum / Duis',
                'model' => 'Quisque at tortor',
                'image' => 'http://www.example.com/lorem_ipsum.jpg',
                'description' => 'Nulla vestibulum augue turpis, a vehicula diam ultrices vitae. Vivamus suscipit id neque ac venenatis. Interdum et malesuada fames ac ante ipsum primis in faucibus.',
                'sku' => '925379',
            ],
            [
                '@type' => 'Product',
                'name' => 'Donec lorem metus, bibendum ut lacus et, bibendum luctus arcu.',
                'category' => 'Maecenas / Maecenas',
                'model' => 'Pellentesque mollis felis vitae porta dapibus.',
                'image' => 'http://www.example.com/porta_ipsum.jpg',
                'description' => 'Duis tempor velit dui, vel tempor velit posuere eu. Suspendisse rhoncus rhoncus nisl, eu bibendum nunc pharetra at. Quisque dictum diam a tellus ultrices, eu blandit mi auctor.',
                'sku' => '185359',
            ],
        ]
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

    /**
     * @test
     */
    public function shouldHaveIsSimilarToObjects()
    {
        $context = $this->make();

        $this->assertEquals([
            [
                '@type' => 'Product',
                'name' => 'Lorem ipsum dolor sit amet.',
                'category' => 'Vestibulum / Duis',
                'model' => 'Quisque at tortor',
                'image' => 'http://www.example.com/lorem_ipsum.jpg',
                'description' => 'Nulla vestibulum augue turpis, a vehicula diam ultrices vitae. Vivamus suscipit id neque ac venenatis. Interdum et malesuada fames ac ante ipsum primis in faucibus.',
                'sku' => '925379',
            ],
            [
                '@type' => 'Product',
                'name' => 'Donec lorem metus, bibendum ut lacus et, bibendum luctus arcu.',
                'category' => 'Maecenas / Maecenas',
                'model' => 'Pellentesque mollis felis vitae porta dapibus.',
                'image' => 'http://www.example.com/porta_ipsum.jpg',
                'description' => 'Duis tempor velit dui, vel tempor velit posuere eu. Suspendisse rhoncus rhoncus nisl, eu bibendum nunc pharetra at. Quisque dictum diam a tellus ultrices, eu blandit mi auctor.',
                'sku' => '185359',
            ],
        ], $context->getProperty('isSimilarTo'));
    }
}
