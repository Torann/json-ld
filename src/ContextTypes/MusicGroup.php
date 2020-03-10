<?php

namespace JsonLd\ContextTypes;

class MusicGroup extends MusicAbstractContext
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
        'description' => null,
        'track' => null,
        'image' => null,
    ];
}
