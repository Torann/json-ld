<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class PlaceTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\Place::class;

    protected $attributes = [
        'name' => 'Fluff Hut',
        'address' => [
            'streetAddress' => '112 Apple St.',
            'addressLocality' => 'Hamden',
            'addressRegion' => 'CT',
            'postalCode' => '06514',
        ],
        'review' => [
            'reviewBody' => 'beautifull place',
            'reviewRating' => 10,
        ],
    ];

    public function test_should_have_properties() {

        $this->assertPropertyEquals('name', 'Fluff Hut');

        $this->assertPropertyEquals('address',
            [
                '@type' => 'PostalAddress',
                'streetAddress' => '112 Apple St.',
                'addressLocality' => 'Hamden',
                'addressRegion' => 'CT',
                'postalCode' => '06514',
            ]);

        $this->assertPropertyEquals('review',
            [
                '@type' => 'Review',
                'reviewBody' => 'beautifull place',
                'reviewRating' => 10,
            ]);
    }

}