<?php

namespace JsonLd\ContextTypes;
use JsonLd\DataTypes\Text;
use JsonLd\DataTypes\URL;

class Thing extends AbstractContext
{
    /**
     * Property structure
     * reference: https://schema.org/Thing (alphabetical order)
     *
     * @var array
     */
    protected $structure = [
        'additionalType' => URL::class,
        'alternateName' => Text::class,
        'description' => Text::class,
        'disambiguatingDescription' => Text::class,
//        'identifier' => PropertyValue::class or Text::class or URL::class,
        'image' => ImageObject::class, //or URL::class
        'mainEntityOfPage' => WebPage::class, //CreativeWork::class or URL::class
        'name' => Text::class,
//        'potentialAction' => Action::class,
        'sameAs' => Text::class,
//        'subjectOf' => CreativeWork::class or Event::class,
        'url' => URL::class,
    ];

    /**
     * Thing constructor. Merges extendedStructure up
     *
     * @param array $attributes
     * @param array $extendedStructure
     */
    public function __construct(array $attributes, array $extendedStructure = [])
    {
        $this->structure = array_merge($this->structure, $extendedStructure);
        parent::__construct($attributes);
    }

    /**
     * Set type attribute.
     *
     * @param  string $type
     * @return array
     */
    protected function setTypeAttribute($type)
    {
        // TODO: Add type validation
        return $type;
    }

}
