<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Thing
 */
class Thing extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'alternateName' => null,
        'description' => null,
        'image' => ImageObject::class,
        'mainEntityOfPage' => WebPage::class,
        'sameAs' => null,
        'url' => null,
    ];

    /**
     * Set type attribute.
     *
     * @param string $type
     *
     * @return string
     */
    protected function setTypeAttribute(string $type): string
    {
        // TODO: Add type validation
        return $type;
    }
}
