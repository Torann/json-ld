<?php

namespace JsonLd\ContextTypes;

class BlogPosting extends Article
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'sharedContent' => CreativeWork::class,
    ];
}