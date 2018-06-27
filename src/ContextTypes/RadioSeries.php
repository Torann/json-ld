<?php

namespace JsonLd\ContextTypes;
class RadioSeries extends CreativeWorkSeries
{
    private $extendedStructure = [
        'actor' => null,
        'containsSeason' => null,
        'director' => null,
        'episode' => null,
        'musicBy' => null,
        'numberOfEpisodes' => null,
        'numberOfSeasons' => null,
        'productionCompany' => null,
        'trailer' => null,
    ];

    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure));
    }
}
