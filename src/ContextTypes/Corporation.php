<?php

namespace JsonLd\ContextTypes;

class Corporation extends Organization
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'tickerSymbol' => null,
    ];

}