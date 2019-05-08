<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class EventTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\Event::class;

    protected $attributes = [
        'name' => 'Apple Fest',
        'startDate' => '2013-10-04T00:00',
        'url' => 'https://google.com/events/22',
        'offers' => [
            [
                'name' => 'Beer',
                'price' => '4.99'
            ]
        ],
        'location' => [
            'name' => 'Fluff Hut',
            'address' => [
                'streetAddress' => '112 Apple St.',
                'addressLocality' => 'Hamden',
                'addressRegion' => 'CT',
                'postalCode' => '06514',
            ],
        ],
        'image' => 'https://google.com/some_logo.png',
        'description' => 'A description',
    ];

    /**
     * @test
     */
    public function shouldHaveOffersArray()
    {
        $context = $this->make();

        $this->assertEquals([
            [
                'name' => 'Beer',
                'price' => '4.99'
            ]
        ], $context->getProperty('offers'));
    }


    /**
     * @test
     */
    public function shouldHaveLocationObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'Place',
            'name' => 'Fluff Hut',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '112 Apple St.',
                'addressLocality' => 'Hamden',
                'addressRegion' => 'CT',
                'postalCode' => '06514',
            ],
        ], $context->getProperty('location'));
    }

    /**
     * @test
     */
    public function shouldHaveImage()
    {
        $context = $this->make();

        $this->assertEquals(
            'https://google.com/some_logo.png'
        , $context->getProperty('image'));
    }

    /**
     * @test
     */
    public function shouldHaveDescription()
    {
        $context = $this->make();

        $this->assertEquals(
            'A description'
            , $context->getProperty('description'));
    }
}
