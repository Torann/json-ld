<?php

namespace JsonLd\ContextTypes;
class CreativeWorkSeason extends CreativeWork
{
    private $extendedStructure = [
        'actor' => null,
        'director' => null,
        'endDate' => null,
        'episode' => null,
        'numberOfEpisodes' => null,
        'partOfSeries' => null,
        'productionCompany' => null,
        'seasonNumber' => null,
        'startDate' => null,
        'trailer' => null,
    ];

    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure));
    }
}
