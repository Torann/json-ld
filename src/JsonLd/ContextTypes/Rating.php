<?php

namespace JsonLd\ContextTypes;

class Rating extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'ratingValue' => null,
        'bestRating' => null,  // Required if the rating system is not on a 5-point scale
        'worstRating' => null, // Required if the rating system is not on a 5-point scale
    ];
}