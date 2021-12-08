<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Article
 */
class Article extends CreativeWork
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'articleBody' => null,
        'articleSection' => null,
        'pageEnd' => null,
        'pageStart' => null,
        'pagination' => null,
        'wordCount' => null,
    ];

    /**
     * {@inheritDoc}
     */
    protected function setTextAttribute(string $text): string
    {
        return $this->truncate($text, 260);
    }

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

    /**
     * Set the article body attribute.
     *
     * @param string $text
     *
     * @return string
     */
    protected function setArticleBodyAttribute(string $text): string
    {
        return $this->truncate($text, 260);
    }
}
