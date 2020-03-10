<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/Thing
 */
class Thing extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'alternateName' => null,
        'description' => null,
        'image' => ImageObject::class,
        'mainEntityOfPage' => WebPage::class,
        'name' => null,
        'sameAs' => null,
        'url' => null,
    ];

    /**
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
     * @param string $type
     *
     * @return string
     */
    protected function setTypeAttribute(string $type): string
    {
        // TODO: Add type validation
        return $type;
    }
}
