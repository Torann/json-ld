<?php

namespace JsonLd\ContextTypes;

class WebPage extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        '@id' => null,
        'url' => null,
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
}