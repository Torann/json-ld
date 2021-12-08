<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/VideoObject
 */
class VideoObject extends MediaObject
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'actor' => Person::class,
        'director' => Person::class,
        'caption' => null,
        'thumbnail' => ImageObject::class,
    ];
}
