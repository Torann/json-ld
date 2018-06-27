<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class ArticleTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\Article::class;

    protected $attributes = [
        'name' => 'More than That',
        'url' => 'https://google.com/1-article',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
        'image' => [
            'url' => 'https://google.com/thumbnail1.jpg',
            'height' => 800,
            'width' => 800
        ],
        'video' => [
            'url' => 'https://google.com/thumbnail1.mov',
            'height' => 800,
            'width' => 800
        ],
        'thumbnailUrl' => 'https://google.com/thumbnail1.jpg',
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
        'review' => [
            'reviewRating' => 5,
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
        'keywords' => 'Lorem,ipsum,dolor',
        'inLanguage' => 'en',
        'dateCreated' => '2013-10-04T00:00',
        'dateModified' => '2013-10-04T00:00',
        'datePublished' => '2013-10-04T00:00',
        'author' => [
            'name' => 'Joe Joe',
        ],
        'mainEntityOfPage' => [
            'url' => 'https://blogspot.com/100-article'
        ],
        'headline' => 'eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    ];

    /**
     * @test
     */
    public function shouldTruncateDescription()
    {
        $context = $this->make();

        $this->assertEquals('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit...', $context->getProperty('description'));
    }

    /**
     * @test
     */
    public function shouldHaveHeadline()
    {
        $context = $this->make();

        $this->assertEquals('eiusmod tempor incididunt ut labore et dolore magna aliqua.', $context->getProperty('headline'));
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

    /**
     * @test
     */
    public function shouldHaveReviewObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'Review',
            'reviewRating' => 5,
        ], $context->getProperty('review'));
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
    public function shouldHaveKeywords()
    {
        $context = $this->make();

        $this->assertEquals('Lorem,ipsum,dolor', $context->getProperty('keywords'));
    }

    /**
     * @test
     */
    public function shouldHaveInLanguage()
    {
        $context = $this->make();

        $this->assertEquals('en', $context->getProperty('inLanguage'));
    }

    /**
     * @test
     */
    public function shouldHaveAuthorObject()
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
    public function shouldHaveMainEntityOfPageObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'WebPage',
            '@id' => 'https://blogspot.com/100-article',
        ], $context->getProperty('mainEntityOfPage'));
    }
}
