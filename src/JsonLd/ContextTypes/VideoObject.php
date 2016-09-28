<?php

namespace JsonLd\ContextTypes;

class VideoObject extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'actor' => Person::class,
        'director' => Person::class,
        'associatedArticle' => NewsArticle::class,
        'bitrate' => null,
        'contentSize' => null,
        'contentUrl' => null,
        'duration' => null,
        'embedUrl' => null,
        'url' => null,
        'height' => null,
        'width' => null,
        'uploadDate' => null,
        'caption' => null,
        'thumbnail' => ImageObject::class,
        'description' => null,
        'thumbnailUrl' => null,
        'name' => null,
    ];
}
