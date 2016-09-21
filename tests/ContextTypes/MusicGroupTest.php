<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class MusicGroupTest extends TestCase
{

    protected $class = \JsonLd\ContextTypes\MusicGroup::class;

    protected $attributes = [
        'name' => 'exercitation ullamco laboris nisi ut',
        'url' => 'https://google.com/1-musicgroup',
        'description' => 'Lorem ipsum dolor sit amet',
        'track' => [
            [
                '@type' => 'MusicRecording',
                'name' => 'magni dolores eo',
                'url' => 'https://google.com/1-musicrecording',
                'duration' => 'PT1M33S', // 1 minute 33 seconds
                'genre' => ['Ambient', 'Classical', 'Folk'],
            ]
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
                'name' => 'magni dolores eo',
                '@id' => 'https://google.com/1-musicrecording',
                'duration' => 'PT1M33S', // 1 minute 33 seconds
                'genre' => 'Ambient, Classical, Folk',
            ]
        ], $context->getProperty('track'));
    }

}
