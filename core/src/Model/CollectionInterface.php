<?php

namespace IntegrationVersion\Core\Model;

use IntegrationVersion\Core\Model\ItemInterface;

interface CollectionInterface
{
    public function addItem(ItemInterface $item): CollectionInterface;

    public function getItems(): \Iterator;

    public function clear(): CollectionInterface;
}
