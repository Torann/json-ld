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
    private $extendedStructure = [
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
     * Constructor. Merges extendedStructure up
     *
     * @param array $attributes
     * @param array $extendedStructure
     */
    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct(
            $attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure)
        );
    }

    /**
     * Set the article body attribute.
     *
     * @param string $txt
     *
     * @return array
     */
    protected function setTextAttribute($txt)
    {
        return $this->truncate($txt, 260);
    }

    /**
     * Set the authors
     *
     * @param array $items
     *
     * @return array
     */
    protected function setAuthorAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        return array_map(function ($item) {
            return $this->getNestedContext(Person::class, $item);
        }, $items);
    }

    /**
     * Set the comments
     *
     * @param array $items
     *
     * @return array
     */
    protected function setCommentAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        return array_map(function ($item) {
            return $this->getNestedContext(Comment::class, $item);
        }, $items);
    }

    /**
     * Set the reviews
     *
     * @param array $items
     *
     * @return array
     */
    protected function setReviewAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        return array_map(function ($item) {
            return $this->getNestedContext(Review::class, $item);
        }, $items);
    }
}
