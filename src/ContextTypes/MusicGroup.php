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
        'description' => null,
        'track' => MusicRecording::class,
        'image' => ImageObject::class,
    ];
}
