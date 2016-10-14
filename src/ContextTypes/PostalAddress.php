<?php

namespace JsonLd\ContextTypes;

class PostalAddress extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'streetAddress' => '',
        'addressLocality' => '',
        'addressRegion' => '',
        'addressCountry' => '',
        'postalCode' => '',
    ];
}