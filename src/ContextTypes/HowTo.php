<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/HowTo
 */
class HowTo extends CreativeWork
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'prepTime' => null,
        'totalTime' => null,
    ];

}
