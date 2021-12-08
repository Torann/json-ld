<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Review
 */
class Review extends CreativeWork
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'itemReviewed' => Thing::class,
        'reviewRating' => Rating::class,
        'reviewBody' => null,
        'duration' => Duration::class, //Not an official attribute
    ];
}