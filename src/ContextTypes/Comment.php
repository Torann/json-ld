<?php

namespace JsonLd\ContextTypes;

class Comment extends CreativeWork 
{
    /**
     * Property structure.
     * reference: https://schema.org/Comment (alphabetical order)
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
