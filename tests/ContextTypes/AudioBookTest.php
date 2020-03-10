<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class AudiobookTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\Audiobook::class;

    protected $attributes = [
        'name' => 'The Title of Book',
        'isbn' => '00000000',
        'abridged' => false,
        'bookEdition' => 'Library edition',
        'bookFormat' => \JsonLd\ContextTypes\BookFormatType::Paperback,
        'transcript' => 'Some text and other things',
        'numberOfPages' => '1234',
        'datePublished' => '2013-10-04T00:00',
        'aggregateRating' => [
            'reviewCount' => 5,
            'ratingValue' => 5,
            'bestRating' => 4,
            'worstRating' => 1,
            'ratingCount' => 4,
        ],
        'author' => [
            '@type' => 'Person',
            'name' => 'Joe Joe',
        ],
        'readBy' => [
            '@type' => 'Person',
            'name' => 'Jammy Jane'
        ],
        'image' => [
            'url' => 'https://google.com/thumbnail1.jpg',
            'height' => 800,
            'width' => 800
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
        'caption' => [
            'contentUrl' => 'https://google.com/thumbnail1.mov',
            'bitrate' => '320kbps',
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
    public function shouldHaveAuthorArray()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'Person',
            'name' => 'Joe Joe',
        ], $context->getProperty('author'));
    }

    /**
     * @test
     */
    public function shouldHaveReadByArray()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'Person',
            'name' => 'Jammy Jane',
        ], $context->getProperty('readBy'));
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
    public function shouldHaveCaptionObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'MediaObject',
            'contentUrl' => 'https://google.com/thumbnail1.mov',
            'bitrate' => '320kbps',
        ], $context->getProperty('caption'));
    }
}
