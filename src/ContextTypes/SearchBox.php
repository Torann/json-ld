<?php

namespace JsonLd\ContextTypes;

/**
 * Not an offical context according to schema.org
 */
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
     * {@inheritDoc}
     */
    public function afterFill($attributes): void
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
    protected function setPotentialActionAttribute(array $properties): array
    {
        return array_merge(['@type' => 'SearchAction'], $properties);
    }
}