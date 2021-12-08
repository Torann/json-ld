<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/NewsArticle
 */
class NewsArticle extends Article
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [];

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