<?php

namespace JsonLd\ContextTypes;

class MusicAlbum extends MusicAbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        '@id' => null,
        'url' => null,
        'name' => null,
        'description' => null,
        'numTracks' => null,
        'byArtist' => null,
        'genre' => null,
        'track' => null,
        'image' => null,
    ];
}
