<?php

namespace JsonLd\ContextTypes;

abstract class MusicAbstractContext extends AbstractContext
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
    ];

    /**
     * Set the canonical URL of the article page.
     *
     * @param string $url
     *
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
     *
     * @return string
     */
    protected function setGenreAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        return implode(', ', $items);
    }

}
