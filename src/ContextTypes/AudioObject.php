<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/AudioObject
 */
class AudioObject extends MediaObject
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'caption' => MediaObject::class,
        'transcript' => null,
    ];

}