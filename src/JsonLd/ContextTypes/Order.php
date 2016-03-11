<?php
namespace JsonLd\ContextTypes;
class Order extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'acceptedOffer' => Offer::class
    ];
}
