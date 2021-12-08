<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/NutritionInformation
 */
class NutritionInformation extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'calories' => null,
        'fatContent' => null,
        'cholesterolContent' => null,
        'sodiumContent' => null,
        'carbohydrateContent' => null,
        'fiberContent' => null,
        'proteinContent' => null,
    ];
}
