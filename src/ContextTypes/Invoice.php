<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Invoice
 */
class Invoice extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'totalPaymentDue' => PriceSpecification::class,
        'provider' => Organization::class,
        'paymentDueDate' => null,
        'paymentStatus' => null,
        'referencesOrder' => Order::class
    ];
}
