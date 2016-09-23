<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class MusicPlaylistTest extends TestCase
{

    protected $class = \JsonLd\ContextTypes\MusicPlaylist::class;

    protected $attributes = [
        'name' => 'magni dolores eo',
        'url' => 'https://google.com/1-musicplaylist',
        'numTracks' => 2,
        'track' => [
            [
                '@type' => 'MusicRecording',
                'name' => 'magni dolores eo',
                'url' => 'https://google.com/1-musicrecording',
                'duration' => 'PT1M33S', // 1 minute 33 seconds
                'genre' => ['Ambient', 'Classical', 'Folk'],
            ],
            [
                '@type' => 'MusicRecording',
                'name' => 'totam rem aperiam',
                'url' => 'https://google.com/2-musicrecording',
                'duration' => 'PT3M33S', // 3 minute 33 seconds
                'genre' => 'Classical',
            ]
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

}
