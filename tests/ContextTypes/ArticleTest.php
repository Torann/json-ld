<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class ArticleTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\Article::class;

    protected $attributes = [
        'name' => 'articleNComments',
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
            '@type' => 'Review',
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
        'commentCount' => 2,
        'comment' => [
                ['@type' => 'Comment',
                 'author' => ['@type' => 'Person', 'name' => 'Joe Joe'],
                 'text' => 'first comment',
                 'dateCreated' => '2018-06-14T21:40:00+02:00'],
                ['@type' => 'Comment',
                 'author' => ['@type' => 'Person', 'name' => 'Joe Bis'],
                 'text' => 'second comment',
                 'dateCreated' => '2018-06-14T23:23:00+02:00']
        ],
        'dateCreated' => '2013-10-04T00:00',
        'dateModified' => '2013-10-04T00:00',
        'datePublished' => '2013-10-04T00:00',
        'author' => [
            '@type' => 'Person',
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
    public function shouldHaveThingName()
    {
        $context = $this->make();

        $this->assertEquals('articleNComments', $context->getProperty('name'));
    }

    /**
     * @test
     */
    public function shouldHaveThingMainEntityOfPageObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'WebPage',
            '@id' => 'https://blogspot.com/100-article',
        ], $context->getProperty('mainEntityOfPage'));
    }

    /**
     * @test
     */
    public function shouldHaveCreativeWorkInLanguage()
    {
        $context = $this->make();

        $this->assertEquals('en', $context->getProperty('inLanguage'));
    }

    /**
     * @test
     */
    public function shouldHaveCreativeWorkAuthorObject()
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
    public function shouldHave2CommentsArray()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'Comment',
            'text' => 'first comment',
            'author' => ['@type' => 'Person', 'name' => 'Joe Joe'],
            'dateCreated' => '2018-06-14T21:40:00+02:00',
        ], $context->getProperty('comment')[0]);
        $this->assertEquals([
            '@type' => 'Comment',
            'text' => 'second comment',
            'author' => ['@type' => 'Person', 'name' => 'Joe Bis'],
            'dateCreated' => '2018-06-14T23:23:00+02:00',
        ], $context->getProperty('comment')[1]);
    }

}
