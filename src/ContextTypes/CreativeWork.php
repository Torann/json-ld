<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/CreativeWork
 */
class CreativeWork extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'about' => Thing::class,
        'aggregateRating' => AggregateRating::class,
        'alternativeHeadline' => null,
        'author' => Person::class,
        'comment' => Comment::class,
        'commentCount' => null,
        'creator' => Person::class,
        'dateCreated' => null,
        'dateModified' => null,
        'datePublished' => null,
        'headline' => null,
        'inLanguage' => null,
        'keywords' => null,
        'learningResourceType' => null,
        'mainEntity' => Thing::class,
        'publisher' => Organization::class,
        'review' => Review::class,
        'text' => null,
        'thumbnailUrl' => null,
        'video' => VideoObject::class,
    ];

    /**
     * Set the article body attribute.
     *
     * @param string $text
     *
     * @return string
     */
    protected function setTextAttribute(string $text): string
    {
        return $this->truncate($text, 260);
    }

}
