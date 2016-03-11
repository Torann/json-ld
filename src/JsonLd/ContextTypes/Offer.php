<?php
namespace JsonLd\ContextTypes;
class Offer extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'itemOffered' => Product::class,
        'price' => null,
        'priceCurrency' => null
    ];
}
