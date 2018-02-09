<?php

namespace JsonLd\ContextTypes;
class PublicationEvent extends Event
{
    private $extendedStructure = [
        'isAccessibleForFree' => null,
        'publishedBy' => null,
        'publishedOn' => BroadcastService::class,
    ];

    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure));
    }
}
