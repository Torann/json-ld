<?php

namespace JsonLd\ContextTypes;

class NewsArticle extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'headline' => null,
        'description' => null,
        'url' => null,
        'mainEntityOfPage' => WebPage::class,
        'image' => ImageObject::class,
        'video' => VideoObject::class,
        'dateCreated' => null,
        'dateModified' => null,
        'datePublished' => null,
        'author' => Person::class,
        'publisher' => Organization::class,
        'articleBody' => null,
    ];

    /**
     * Set the description attribute.
     *
     * @param string $text
     *
     * @return string
     */
    protected function setDescriptionAttribute(string $text): string
    {
        return $this->truncate($text, 260);
    }
}