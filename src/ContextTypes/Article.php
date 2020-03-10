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
    private $extendedStructure = [
        'articleBody' => null,
        'articleSection' => null,
        'pageEnd' => null,
        'pageStart' => null,
        'pagination' => null,
        'wordCount' => null,
        'mainEntityOfPage' => WebPage::class,
    ];

    /**
     * @param array $attributes
     * @param array $extendedStructure
     */
    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct(
            $attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure)
        );
    }

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
