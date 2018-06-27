<?php

namespace JsonLd\ContextTypes;

class CreativeWork extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    private $extendedStructure = [
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
        'publication' => PublicationEvent::class,
        'publisher' => Organization::class,
        'review' => Review::class,
        'text' => null,
        'thumbnailUrl' => null,
        'video' => VideoObject::class,
    ];

    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure));
    }

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
