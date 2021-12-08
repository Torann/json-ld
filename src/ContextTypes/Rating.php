<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Rating
 */
class Rating extends Thing
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