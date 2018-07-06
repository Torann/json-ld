<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class SculptureTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\Sculpture::class;

    protected $attributes = [
        'url' => 'https://exemple.com/sclpture?id=1234',
        'author' => [
            '@type' => 'Person',
            'name' => 'Rodin',
        ],
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
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
        'inLanguage' => 'jp',
        'dateCreated' => '2013-10-04T00:00',
        'name' => 'sculptureNComments'

    ];


    /**
     * @test
     */
    public function shouldHaveThingName()
    {
        $context = $this->make();

        $this->assertEquals('sculptureNComments', $context->getProperty('name'));
    }

    /**
     * @test
     */
    public function shouldHaveCreativeWorkInLanguage()
    {
        $context = $this->make();

        $this->assertEquals('jp', $context->getProperty('inLanguage'));
    }

    /**
     * @test
     */
    public function shouldHaveCreativeWorkAuthorObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'Person',
            'name' => 'Rodin',
        ], $context->getProperty('author'));
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
