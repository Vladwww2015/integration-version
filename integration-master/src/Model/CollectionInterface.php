<?php

namespace IntegrationHelper\IntegrationMaster\Model;

interface CollectionInterface
{
    public function addItem(ItemInterface $item): CollectionInterface;

    public function getItems(): \Iterator;

    /**
     * @return ItemInterface[]
     */
    public function getData(): array;

    public function clear(): CollectionInterface;
}
