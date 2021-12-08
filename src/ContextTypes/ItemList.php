<?php

namespace JsonLd\ContextTypes;

/**
 * https://schema.org/ItemList
 */
class ItemList extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'itemListElement' => null,
    ];

    /**
     * Set the canonical URL of the article page.
     *
     * @param array $items
     *
     * @return array
     */
    protected function setItemListElementAttribute(array $items): array
    {
        foreach ($items as $pos => $item) {
            $items[$pos] = $this->getNestedContext(ListItem::class, [
                'position' => $pos + 1,
                'item' => $item
            ]);
        }

        return $items;
    }
}