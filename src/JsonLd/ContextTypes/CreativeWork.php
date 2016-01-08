<?php

namespace JsonLd\ContextTypes;

class CreativeWork extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'name' => null,
        'url' => null,
        'aggregateRating' => AggregateRating::class,
        'author' => Person::class,
        'creator' => Person::class,
        'dateCreated' => null,
        'dateModified' => null,
        'datePublished' => null,
        'headline' => null,
        'image' => ImageObject::class,
        'inLanguage' => null,
        'publisher' => Organization::class,
        'review' => Review::class,
        'text' => null,
        'thumbnailUrl' => null,
        'video' => VideoObject::class,
    ];

    /**
     * Set the article body attribute.
     *
     * @param  string $txt
     * @return array
     */
    protected function setTextAttribute($txt)
    {
        return $this->truncate($txt, 260);
    }
}