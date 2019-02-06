<?php

namespace JsonLd\ContextTypes;

class Recipe extends CreativeWork
{
    /**
     * Property structure
     * reference: https://schema.org/Recipe (alphabetical order)
     *
     * @var array
     */
    protected $structure = [
        'name' => null,
        'prepTime' => null,
        'cookTime' => null,
        'totalTime' => null,
        'image' => null,
        'recipeCategory' => null,
        'description' => null,
        'recipeIngredient' => null,
        'recipeInstructions' => null,
        'recipeYield' => null,
        'author' => null,
        'nutritionInformation' => NutritionInformation::class,
        'aggregateRating' => AggregateRating::class,
        'review' => Review::class,
    ];
}
