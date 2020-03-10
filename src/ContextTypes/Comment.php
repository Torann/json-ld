<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Comment
 */
class Comment extends CreativeWork
{
    /**
     * Property structure
     *
     * @var array
     */
    private $extendedStructure = [
        'downvoteCount' => null,
        'upvoteCount' => null,
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
}
