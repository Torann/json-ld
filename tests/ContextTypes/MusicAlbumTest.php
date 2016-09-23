<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class MusicAlbumTest extends TestCase
{

    protected $class = \JsonLd\ContextTypes\MusicAlbum::class;

    protected $attributes = [
        'name' => 'exercitation ullamco laboris nisi ut',
        'url' => 'https://google.com/1-musicalbum',
        'description' => 'Lorem ipsum dolor sit amet',
        'numTracks' => 5,
        'track' => [
            [
                '@type' => 'MusicRecording',
                'url' => 'https://google.com/1-musicrecording',
                'name' => 'magni dolores eo',
                'duration' => 'PT1M33S', // 1 minute 33 seconds
                'genre' => ['Ambient', 'Classical', 'Folk'],
            ],
            [
                '@type' => 'MusicRecording',
                'url' => 'https://google.com/2-musicrecording',
                'name' => 'totam rem aperiam',
                'duration' => 'PT3M33S', // 3 minute 33 seconds
                'genre' => 'Classical',
            ]
        ],
        'byArtist' => [
            'url' => 'https://google.com/1-musicgroup',
            'name' => 'exercitation ullamco laboris nisi ut',
            'description' => 'Lorem ipsum dolor sit amet',
        ],
    ];

    /**
     * @test
     */
    public function shouldHaveName()
    {
        $context = $this->make();

        $this->assertEquals('exercitation ullamco laboris nisi ut', $context->getProperty('name'));
    }

    /**
     * @test
     */
    public function shouldHaveDescription()
    {
        $context = $this->make();

        $this->assertEquals('Lorem ipsum dolor sit amet', $context->getProperty('description'));
    }

    /**
     * @test
     */
    public function shouldHaveTrackObject()
    {
        $context = $this->make();

        $this->assertEquals([
            [
                '@type' => 'MusicRecording',
                '@id' => 'https://google.com/1-musicrecording',
                'name' => 'magni dolores eo',
                'duration' => 'PT1M33S', // 1 minute 33 seconds
                'genre' => 'Ambient, Classical, Folk',
            ],
            [
                '@type' => 'MusicRecording',
                '@id' => 'https://google.com/2-musicrecording',
                'name' => 'totam rem aperiam',
                'duration' => 'PT3M33S', // 3 minute 33 seconds
                'genre' => 'Classical',
            ],
        ], $context->getProperty('track'));
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
            'description' => 'Lorem ipsum dolor sit amet',
        ], $context->getProperty('byArtist'));
    }

    /**
     * @test
     */
    public function shouldBeAbleToSetByArtistAsString()
    {
        $this->attributes['byArtist'] = 'voluptas nulla pariatu';
        $context = $this->make();

        $this->assertEquals('voluptas nulla pariatu', $context->getProperty('byArtist'));
    }

}
