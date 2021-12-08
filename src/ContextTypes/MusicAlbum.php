<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/MusicAlbum
 */
class MusicAlbum extends MusicAbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'description' => null,
        'numTracks' => null,
        'byArtist' => MusicGroup::class,
        'genre' => null,
        'track' => MusicRecording::class,
        'image' => ImageObject::class,
    ];
}
