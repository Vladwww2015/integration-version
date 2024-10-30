<?php

namespace IntegrationHelper\IntegrationVersion\Repository;

use IntegrationHelper\IntegrationVersion\Model\IntegrationVersionInterface;

interface IntegrationVersionRepositoryInterface
{
    /**
     * @return iterable
     */
    public function getItems(): iterable;

    /**
     * @param string $source
     * @return IntegrationVersionInterface
     */
    public function getItemBySource(string $source): IntegrationVersionInterface;

    /**
     * @param int $id
     * @return IntegrationVersionInterface
     */
    public function getItemById(int $id): IntegrationVersionInterface;

    /**
     * @param IntegrationVersionInterface $item
     * @return mixed
     */
    public function updateItem(IntegrationVersionInterface $item): IntegrationVersionInterface;

    /**
     * @param array $data
     * @return IntegrationVersionInterface
     */
    public function createItem(array $data): IntegrationVersionInterface;
}
