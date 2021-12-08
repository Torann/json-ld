<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Recipe
 */
class Recipe extends AbstractContext
{
    /**
     * Property structure
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
        'recipeCuisine' => null,
        'author' => Person::class,
        'nutrition' => NutritionInformation::class,
        'aggregateRating' => AggregateRating::class,
        'review' => Review::class,
        'video' => VideoObject::class,
    ];

}
