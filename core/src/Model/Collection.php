<?php

namespace core\src\Model;

use IntegrationVersion\Core\Model\ItemInterface;
use IntegrationVersion\Core\Model\CollectionInterface;

class Collection implements CollectionInterface
{
    protected array $items = [];

    public function __construct(array $items = [])
    {
        foreach ($items as $item) {
            $this->addItem($item);
        }
    }

    public function addItem(ItemInterface $item): CollectionInterface
    {
        $this->items[] = $item;

        return $this;
    }

    public function getItems(): \Iterator
    {
        return new \ArrayIterator($this->items);
    }

    public function clear(): CollectionInterface
    {
        $this->items = [];
    }
}
