<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class WebSiteTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\WebSite::class;

    protected $attributes = [
        'about'    => 'The subject matter of the content.',
        'headline' => 'Headline of the website.',
        'image'    => 'https://og.github.com/mark/github-mark@1200x630.png',
        'name'     => 'The name of the item.',
        'url'      => 'https://schema.org/WebSite',
        'publisher' => [
            'name' => 'Google',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => 'https://google.com/logo.jpg',
                'width' => 600,
                'height' => 60,
            ]
        ],
        'keywords' => 'about,headline,image,name,url',
        'inLanguage' => 'en',
        'dateCreated' => '2013-10-04T00:00',
        'dateModified' => '2013-10-04T00:00',
        'datePublished' => '2013-10-04T00:00',
        'sameAs'   => 'https://schema.org/sameAs',
    ];

    /**
     * @test
     */
    public function shouldGetProperties()
    {
        $context = $this->make();

        $attributesPlus = $this->attributes;
        $attributesPlus['@context'] = 'http://schema.org';
        $attributesPlus["@type"] = 'WebSite';
        $attributesPlus["publisher"]["@type"] = 'Organization';

        $this->assertEquals($context->getProperties(), $attributesPlus);
    }

    /**
     * @test
     */
    public function shouldHaveHeadline()
    {
        $context = $this->make();

        $this->assertEquals('Headline of the website.', $context->getProperty('headline'));
    }

    /**
     * @test
     */
    public function shouldHavePublisherObject()
    {
        $context = $this->make();

        $this->assertEquals([
            '@type' => 'Organization',
            'name' => 'Google',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => 'https://google.com/logo.jpg',
                'height' => 60,
                'width' => 600,
            ],
        ], $context->getProperty('publisher'));
    }

    /**
     * @test
     */
    public function shouldHaveKeywords()
    {
        $context = $this->make();

        $this->assertEquals('about,headline,image,name,url', $context->getProperty('keywords'));
    }

    /**
     * @test
     */
    public function shouldHaveInLanguage()
    {
        $context = $this->make();

        $this->assertEquals('en', $context->getProperty('inLanguage'));
    }
}