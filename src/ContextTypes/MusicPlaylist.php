<?php

namespace JsonLd\ContextTypes;

class MusicPlaylist extends MusicAbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'numTracks' => null,
        'track' => MusicRecording::class,
    ];
}
