<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class CreativeWorkTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\CreativeWork::class;

    protected $attributes = [
        'aggregateRating' => [
            'reviewCount' => 5,
            'ratingValue' => 5,
            'bestRating' => 4,
            'worstRating' => 1,
            'ratingCount' => 4,
        ],
        'author' => [
            ['@type' => 'Person',
             'name' => 'Joe Joe'],
            ['@type' => 'Person',
             'name' => 'Jammy Joe'],
        ],
        'creator' => [
            'name' => 'Joe Joe',
        ],
        'image' => [
            "url" => 'https://google.com/thumbnail1.jpg',
            "height" => 800,
            "width" => 800
        ],
        'publisher' => [
            'name' => 'Google',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => 'https://google.com/logo.jpg',
                'width' => 600,
                'height' => 60,
            ]
        ],
        'review' => [
            ['@type' => 'Review', 'name' => 'first review', 'reviewRating' => 3],
            ['@type' => 'Review', 'name' => 'second review', 'reviewRating' => 5],
        ],
        'video' => [
            "url" => 'https://google.com/thumbnail1.mov',
            "height" => 800,
            "width" => 800
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
            'reviewCount' => 5,
            'ratingValue' => 5,
            'bestRating' => 4,
            'worstRating' => 1,
            'ratingCount' => 4,
        ], $context->getProperty('aggregateRating'));
    }

    /**
     * @test
     */
    public function shouldHave2AuthorsArray()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'Person',
            'name' => 'Joe Joe',
        ], $context->getProperty('author')[0]);
        $this->assertEquals([
            '@type' => 'Person',
            'name' => 'Jammy Joe',
        ], $context->getProperty('author')[1]);
    }


    /**
     * @test
     */
    public function shouldHaveCreatorObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'Person',
            'name' => 'Joe Joe',
        ], $context->getProperty('creator'));
    }

    /**
     * @test
     */
    public function shouldHaveImageObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'ImageObject',
            'url' => 'https://google.com/thumbnail1.jpg',
            'height' => 800,
            'width' => 800,
        ], $context->getProperty('image'));
    }

    /**
     * @test
     */
    public function shouldHavePublisherObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'Organization',
            'name' => 'Google',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => 'https://google.com/logo.jpg',
                'height' => 60,
                'width' => 600,
            ],
        ], $context->getProperty('publisher'));
    }

    /**
     * @test
     */
    public function shouldHave2ReviewsArray()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'Review',
            'name' => 'first review',
            'reviewRating' => 3
        ], $context->getProperty('review')[0]);
        $this->assertEquals([
            '@type' => 'Review',
            'name' => 'second review',
            'reviewRating' => 5
        ], $context->getProperty('review')[1]);
    }

    /**
     * @test
     */
    public function shouldHaveVideoObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'VideoObject',
            'url' => 'https://google.com/thumbnail1.mov',
            'height' => 800,
            'width' => 800,
        ], $context->getProperty('video'));
    }
}
