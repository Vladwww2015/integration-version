<?php

namespace IntegrationHelper\IntegrationVersion\Storage;

use IntegrationHelper\IntegrationVersion\Model\ItemInterface;

interface ItemStorageInterface
{
    /**
     * @param string|int $id
     * @return ItemInterface
     */
    public function get(string|int $id): ItemInterface;

    /**
     * @param string $source
     * @return ItemInterface[]
     */
    public function getBySource(string $source): array;

    /**
     * @param string $source
     * @param string|int $identity
     * @return ItemInterface
     */
    public function getByIdentity(string $source, string|int $identity): ItemInterface;

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
     * @param string|int $id
     * @return ItemStorageInterface
     */
    public function delete(string|int $id): ItemStorageInterface;
}
