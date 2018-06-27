<?php

namespace JsonLd\ContextTypes;
class BroadcastEvent extends PublicationEvent
{
    private $extendedStructure = [
        'broadcastOfEvent' => null,
        'isLiveBroadcast' => null,
        'videoFormat' => null,
    ];

    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure));
    }
}
