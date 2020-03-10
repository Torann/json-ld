<?php

namespace JsonLd\ContextTypes;

class SearchBox extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'url' => null,
        'potentialAction' => null,
    ];

    /**
     * After fill event.
     *
     * @param array $attributes
     */
    public function afterFill($attributes)
    {
        $this->setType('WebSite');
    }

    /**
     * Set potential action.
     *
     * @param array $properties
     *
     * @return array
     */
    protected function setPotentialActionAttribute($properties)
    {
        return array_merge(['@type' => 'SearchAction'], $properties);
    }
}