<?php

namespace JsonLd\ContextTypes;

class Thing extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'name' => null,
        'alternateName' => null,
        'description' => null,
        'image' => null,
    ];

    /**
     * Set type attribute.
     *
     * @param  string $type
     * @return array
     */
    protected function setTypeAttribute($type)
    {
        // TODO: Add type validation
        return $type;
    }
}