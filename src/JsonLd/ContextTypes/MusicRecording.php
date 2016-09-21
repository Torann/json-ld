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
        '@id' => null,
        'url' => null,
        'name' => null,
        'duration' => null,
        'genre' => null,
        'description' => null,
        'byArtist' => null,
        'inAlbum' => null,
        'inPlaylist' => null,
        'isrcCode' => null,
    ];

    /**
     * Set in album attribute
     *
     * @param array|string $item
     * @return array
     */
    protected function setInAlbumAttribute($item)
    {
        if ( ! is_array($item))
        {
            return $item;
        }

        return $this->getNestedContext(MusicAlbum::class, $item);
    }

    /**
     * Set in playlist attribute
     *
     * @param array|string $item
     * @return array
     */
    protected function setInPlaylistAttribute($item)
    {
        if ( ! is_array($item))
        {
            return $item;
        }

        return $this->getNestedContext(MusicPlaylist::class, $item);
    }
}
