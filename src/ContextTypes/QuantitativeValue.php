<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/QuantitativeValue
 */
class QuantitativeValue extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'maxValue' => null,
        'minValue' => null,
        'value' => null,
        'unitText' => null,
    ];
}