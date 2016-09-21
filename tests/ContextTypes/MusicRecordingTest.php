<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class MusicRecordingTest extends TestCase
{

    protected $class = \JsonLd\ContextTypes\MusicRecording::class;

    protected $attributes = [
        'name' => 'magni dolores eo',
        'url' => 'https://google.com/1-musicrecording',
        'duration' => 'PT1M33S', // 1 minute 33 seconds
        'genre' => ['Ambient', 'Classical', 'Folk'], // can also be a string
        'byArtist' => [
            'name' => 'exercitation ullamco laboris nisi ut',
            'url' => 'https://google.com/1-musicgroup',
            'description' => 'aliquam quaerat voluptatem.',
        ],
        'inAlbum' => [
            'name' => 'sed quia consequuntur',
            'url' => 'https://google.com/1-musicalbum',
            'description' => 'Lorem ipsum dolor sit amet',
        ],
    ];

    /**
     * @test
     */
    public function shouldHaveName()
    {
        $context = $this->make();

        $this->assertEquals('magni dolores eo', $context->getProperty('name'));
    }

    /**
     * @test
     */
    public function shouldHaveGenre()
    {
        $context = $this->make();

        $this->assertEquals('Ambient, Classical, Folk', $context->getProperty('genre'));
    }

    /**
     * @test
     */
    public function shouldBeAbleToSetGenreAsString()
    {
        $this->attributes['genre'] = 'Classical';
        $context = $this->make();

        $this->assertEquals('Classical', $context->getProperty('genre'));
    }

    /**
     * @test
     */
    public function shouldHaveByArtistObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'MusicGroup',
            '@id' => 'https://google.com/1-musicgroup',
            'name' => 'exercitation ullamco laboris nisi ut',
            'description' => 'aliquam quaerat voluptatem.',
        ], $context->getProperty('byArtist'));
    }

    /**
     * @test
     */
    public function shouldHaveInAlbumObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'MusicAlbum',
            '@id' => 'https://google.com/1-musicalbum',
            'name' => 'sed quia consequuntur',
            'description' => 'Lorem ipsum dolor sit amet',
        ], $context->getProperty('inAlbum'));
    }

}
