<?php

namespace JsonLd\ContextTypes;

class NutritionInformation extends AbstractContext
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
