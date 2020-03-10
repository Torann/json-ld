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
     * @param array|string $items
     *
     * @return array
     */
    protected function setInAlbumAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        //Check if not multidimensional array (for backward compatibility)
        if ((count($items) == count($items, COUNT_RECURSIVE))) {
            return $this->getNestedContext(MusicAlbum::class, $items);
        }

        //multiple albums
        return array_map(function ($item) {
            return $this->getNestedContext(MusicAlbum::class, $item);
        }, $items);
    }

    /**
     * Set in playlist attribute
     *
     * @param array|string $item
     *
     * @return array
     */
    protected function setInPlaylistAttribute($item)
    {
        if (is_array($item) === false) {
            return $item;
        }

        return $this->getNestedContext(MusicPlaylist::class, $item);
    }
}
