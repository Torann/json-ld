<?php

namespace JsonLd\ContextTypes;

class Article extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'name' => null,
        'url' => null,
        'description' => null,

        'image' => ImageObject::class,
        'video' => VideoObject::class,
        'thumbnailUrl' => null,
        'text' => null,
        'review' => Review::class,
        'publisher' => Organization::class,
        'keywords' => null,
        'inLanguage' => null,
        'dateCreated' => null,
        'dateModified' => null,
        'datePublished' => null,
        'author' => Person::class,
        'aggregateRating' => AggregateRating::class,

        'articleBody' => null,
        'articleSection' => null,
        'pageEnd' => null,
        'pageStart' => null,
        'pagination' => null,
        'mainEntityOfPage' => WebPage::class,
        'headline' => null,
    ];

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
