<?php


namespace JsonLd\DataTypes;


class DateTime extends AbstractDataType
{

    /**
     * @see https://schema.org/DateTime
     */


    public function __construct($attributes)
    {
        // Format date and time to UTC
        if ($attributes instanceof \DateTime) {
            $this->attibutes = $attributes->format('Y-m-d\TH:i:s');
        } else {
            parent::__construct($attributes);
        }
    }
}