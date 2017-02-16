<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class WebSiteTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\WebSite::class;

    protected $attributes = [
        'about'    => 'The subject matter of the content.',
        'headline' => 'Headline of the article.',
        'image'    => 'https://og.github.com/mark/github-mark@1200x630.png',
        'name'     => 'The name of the item.',
        'url'      => 'https://schema.org/WebSite',
        'keywords' => 'about,headline,image,name,url',
        'sameAs'   => 'https://schema.org/sameAs',
    ];

    /**
     * @test
     */
    public function shouldGetProperties()
    {
        $context = $this->make();

        $this->assertEquals(array_merge([
            '@context' => 'http://schema.org',
            '@type'    => 'WebSite',
        ], $this->attributes), $context->getProperties());
    }
}