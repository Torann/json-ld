<?php

namespace JsonLd\ContextTypes;
class TVEpisode extends Episode
{
    private $extendedStructure = [
        'countryOfOrigin' => null,
        'subtitleLanguage' => null,
    ];

    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure));
    }
}
