<?php

namespace JsonLd\ContextTypes;

class Article extends CreativeWork
{
    /**
     * Property structure
     * reference: https://schema.org/Article (alphabetical order)
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
     * Constructor. Merges extendedStructure up
     *
     * @param array $attributes
     * @param array $extendedStructure
     */
    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure));
    }

    /**
     * Set the description attribute.
     *
     * @param  string $txt
     * @return array
     */
    protected function setDescriptionAttribute($txt)
    {
        return $this->truncate($txt, 260);
    }

    /**
     * Set the text attribute.
     *
     * @param  string $txt
     * @return array
     */
    protected function setTextAttribute($txt)
    {
        return $this->truncate($txt, 260);
    }

    /**
     * Set the article body attribute.
     *
     * @param  string $txt
     * @return array
     */
    protected function setArticleBodyAttribute($txt)
    {
        return $this->truncate($txt, 260);
    }
}
