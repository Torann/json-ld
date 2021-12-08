<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/WebPage
 */
class WebPage extends CreativeWork
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        '@id' => null, //Not an official attribute
    ];

    /**
     * Set the canonical URL of the article page.
     *
     * @param string $url
     *
     * @return null
     */
    protected function setUrlAttribute($url)
    {
        // The URL is used as an ID
        $this->properties['@id'] = $url;

        return null;
    }
}