<?php

namespace JsonLd\ContextTypes;

class MusicRecording extends MusicAbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'duration' => null,
        'genre' => null,
        'description' => null,
        'byArtist' => MusicGroup::class,
        'inAlbum' => MusicAlbum::class,
        'inPlaylist' => MusicPlaylist::class,
        'isrcCode' => null,
    ];

}
