<?php

namespace JsonLd\ContextTypes;
class Episode extends CreativeWork
{
    private $extendedStructure = [
        'actor' => null,
        'director' => null,
        'episodeNumber' => null,
        'musicBy' => null,
        'partOfSeason' => CreativeWorkSeason::class,
        'partOfSeries' => CreativeWorkSeries::class,
        'productionCompany' => null,
        'trailer' => null,
    ];

    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure));
    }
}
