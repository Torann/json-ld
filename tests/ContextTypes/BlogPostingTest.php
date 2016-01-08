<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class BlogPostingTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\BlogPosting::class;

    protected $attributes = [
        'name' => 'More than That',
        'url' => 'https://google.com/1-article',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
        'sharedContent' => [
            'url' => 'https://google.com/thumbnail1.jpg',
            'name' => 'My Post',
        ],
    ];

    /**
     * @test
     */
    public function shouldTruncateDescription()
    {
        $context = $this->make();

        $this->assertEquals('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit...', $context->getProperty('description'));
    }

    /**
     * @test
     */
    public function shouldHaveSharedContentObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'CreativeWork',
            'name' => 'My Post',
            'url' => 'https://google.com/thumbnail1.jpg',
        ], $context->getProperty('sharedContent'));
    }
}
