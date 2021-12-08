<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Recipe
 */
class Recipe extends HowTo
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'cookTime' => null,
        'recipeCategory' => null,
        'recipeIngredient' => null,
        'recipeInstructions' => null,
        'recipeYield' => null,
        'recipeCuisine' => null,
        'nutrition' => NutritionInformation::class,
    ];

}
