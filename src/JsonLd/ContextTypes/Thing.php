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
     * Thing constructor. Merges extendStructure up
     *
     * @param array $attributes
     * @param array $extendStructure
     */
    public function __construct(array $attributes, array $extendStructure = [])
    {
        $this->structure = array_merge($this->structure, $extendStructure);
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