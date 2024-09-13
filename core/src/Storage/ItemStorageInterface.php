<?php

namespace IntegrationVersion\Core\Storage;

use IntegrationVersion\Core\Model\ItemInterface;

interface ItemStorageInterface
{
    /**
     * @param string|integer $id
     * @return ItemInterface
     */
    public function get(string|integer $id): ItemInterface;

    /**
     * @param string $source
     * @return ItemInterface[]
     */
    public function getBySource(string $source): array;

    /**
     * @param string $source
     * @param string $identity
     * @return ItemInterface
     */
    public function getByIdentity(string $source, string|integer $identity): ItemInterface;

    /**
     * @param ItemInterface $item
     * @return ItemStorageInterface
     */
    public function create(ItemInterface $item): ItemStorageInterface;

    /**
     * @param ItemInterface $item
     * @return ItemStorageInterface
     */
    public function update(ItemInterface $item): ItemStorageInterface;

    /**
     * @param string|integer $id
     * @return ItemStorageInterface
     */
    public function delete(string|integer $id): ItemStorageInterface;
}
