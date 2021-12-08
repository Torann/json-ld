<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/MusicGroup
 */
class MusicGroup extends MusicAbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'description' => null,
        'track' => MusicRecording::class,
        'image' => ImageObject::class,
    ];
}
