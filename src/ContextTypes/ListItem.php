<?php

namespace JsonLd\ContextTypes;

class ListItem extends AbstractContext
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
    protected function setItemAttribute($item)
    {
        return [
            '@id' => $this->getArrValue($item, 'url'),
            'name' => $this->getArrValue($item, 'name')
        ];
    }
}