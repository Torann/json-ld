<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/ListItem
 */
class ListItem extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'position' => null,
        'item' => null,
    ];

    /**
     * Set item in list.
     *
     * @param array $item
     *
     * @return array
     */
    protected function setItemAttribute(array $item): array
    {
        return [
            '@id' => $this->getArrValue($item, 'url'),
            'name' => $this->getArrValue($item, 'name')
        ];
    }
}