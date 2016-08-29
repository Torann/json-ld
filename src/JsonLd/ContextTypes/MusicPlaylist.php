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
        '@id' => null,
        'name' => null,
        'url' => null,
        'numTracks' => null,
        'track' => null,
    ];
}
