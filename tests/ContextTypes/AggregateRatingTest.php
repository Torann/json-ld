<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class AggregateRatingTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\AggregateRating::class;

    protected $attributes = [
        'sameAs' => 'http://google.com/profile',
        'reviewCount' => 5,
        'ratingValue' => 2.4,
        'bestRating' => 4.5,
        'worstRating' => 1,
        'ratingCount' => 4,
        'itemReviewed' => [
            '@type' => 'Thing',
            'name' => 'Fluff Hut',
        ],
    ];

    /**
     * @test
     */
    public function shouldGetProperties()
    {
        $context = $this->make();

        $this->assertEquals(array_merge([
            '@context' => 'http://schema.org',
            '@type' => 'AggregateRating',
        ], $this->attributes), $context->getProperties());
    }
}
