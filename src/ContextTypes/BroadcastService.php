<?php

namespace JsonLd\ContextTypes;

class BroadcastService extends Service
{
    private $extendedStructure = [
        'broadcastAffiliateOf' => null,
        'broadcastDisplayName' => null,
        'broadcastFrequency' => null,
        'broadcastTimezone' => null,
        'broadcaster' => Organization::class,
        'hasBroadcastChannel' => null,
        'parentService' => BroadcastService::class,
        'videoFormat' => null,
    ];

    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure));
    }
}
