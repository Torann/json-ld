<?php

namespace JsonLd\ContextTypes;

class WebSite extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'about'    => null,
        'headline' => null,
        'image'    => null,
        'name'     => null,
        'url'      => null,
        'keywords' => null,
        'sameAs'   => null,
    ];
}