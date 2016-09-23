<?php

namespace JsonLd\ContextTypes;

class Thing extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'name' => null,
        'alternateName' => null,
        'description' => null,
        'image' => null,
        'url' => null,
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