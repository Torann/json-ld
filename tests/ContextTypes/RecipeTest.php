<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class RecipeTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\Recipe::class;

    protected $attributes = [
        'name' => 'Fried Sugar Egg',
        'prepTime' => 'PT30M',
        'cookTime' => 'PT1H',
        'totalTime' => 'PT1H30M',
        'image' => 'http://www.google.com/image.jpg',
        'recipeCategory' => [
            'christmas',
            'dinner',
            'soup',
        ],
        'description' => 'Lorem ipsum dolor sit amet',
        'recipeIngredient' => [
            '1 egg',
            '2 gram of sugar',
        ],
        'recipeInstructions' => '1. work with eggs, 2. add suger, 3. done',
        'recipeYield' => '30 packages',
        'recipeCuisine' => 'American',
        'author' => [
            'givenName' => 'Peter',
        ],
        'nutrition' => [
            'calories' => '428 calories',
            'fatContent' => '23g fat (8g saturated fat)',
            'cholesterolContent' => '53mg cholesterol',
            'sodiumContent' => '1146mg sodium',
            'carbohydrateContent' => '33g carbohydrate (3g sugars',
            'fiberContent' => '2g fiber',
            'proteinContent' => '21g protein.',
        ],
        'aggregateRating' => [
            'ratingValue' => 5,
            'reviewCount' => 5,
            'ratingCount' => 3,
        ],
        'review' => [
            [
                'name' => 'first review',
                'reviewRating' => 3
            ],
            [
                'name' => 'second review',
                'reviewRating' => 5
            ],
        ],
        'video' => [
            'url' => 'http://www.google.com',
        ]
    ];

    /**
     * @test
     */
    public function shouldHaveValidRecipe()
    {
        $context = $this->make();

        $this->assertEquals('Fried Sugar Egg', $context->getProperty('name'));
        $this->assertEquals('PT1H', $context->getProperty('cookTime'));
        $this->assertEquals(2, count($context->getProperty('recipeIngredient')));
        $this->assertEquals(3, count($context->getProperty('recipeCategory')));

        $nutrition = $context->getProperty('nutrition');
        $this->assertEquals('NutritionInformation', $nutrition['@type']);
        $this->assertEquals(8, count($nutrition));
        $this->assertEquals('2g fiber', $nutrition['fiberContent']);
        $this->assertEquals('428 calories', $nutrition['calories']);

        $this->assertEquals([
            '@type' => 'AggregateRating',
            'ratingValue' => 5,
            'reviewCount' => 5,
            'ratingCount' => 3,
        ], $context->getProperty('aggregateRating'));

        $review = $context->getProperty('review');
        $this->assertEquals('Review', $review[1]['@type']);

        $author = $context->getProperty('author');
        $this->assertEquals('Person', $author['@type']);

        $video = $context->getProperty('video');
        $this->assertEquals('VideoObject', $video['@type']);
    }
}
