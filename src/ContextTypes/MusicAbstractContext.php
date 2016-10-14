<?php

namespace JsonLd\ContextTypes;

abstract class MusicAbstractContext extends AbstractContext
{

    /**
     * Set the canonical URL of the article page.
     *
     * @param  string $url
     * @return array
     */
    protected function setUrlAttribute($url)
    {
        // The URL is used as an ID
        $this->properties['@id'] = $url;

        return null;
    }

    /**
     * Set genre(s) attribute
     *
     * @param array|string $items
     * @return string
     */
    protected function setGenreAttribute($items)
    {
        if ( ! is_array($items))
        {
            return $items;
        }

        return implode(', ', $items);
    }

    /**
     * Set artist attribute
     *
     * @param array|string $item
     * @return array
     */
    protected function setByArtistAttribute($item)
    {
        if ( ! is_array($item))
        {
            return $item;
        }

        return $this->getNestedContext(MusicGroup::class, $item);
    }

    /**
     * Set the tracks for a music group
     *
     * @param array $items
     * @return array
     */
    protected function setTrackAttribute($items)
    {
        if ( ! is_array($items))
        {
            return $items;
        }

        return array_map(function ($item) {
            return $this->getNestedContext(MusicRecording::class, $item);
        }, $items);
    }

    /**
     * Set image attribute
     *
     * @param array|string $item
     * @return array
     */
    protected function setImageAttribute($item)
    {
        if ( ! is_array($item))
        {
            return $item;
        }

        return $this->getNestedContext(ImageObject::class, $item);
    }
}
