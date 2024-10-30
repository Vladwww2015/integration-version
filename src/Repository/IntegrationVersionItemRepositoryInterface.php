<?php

namespace IntegrationHelper\IntegrationVersion\Repository;

use IntegrationHelper\IntegrationVersion\Model\IntegrationVersionItemInterface;

interface IntegrationVersionItemRepositoryInterface
{
    /**
     * @param int $parentId
     * @param array $identityValues
     * @return IntegrationVersionItemInterface[]
     */
    public function getItems(int $parentId, array $identityValues): iterable;

    /**
     * @param int $id
     * @return IntegrationVersionItemInterface
     */
    public function getItemById(int $id): IntegrationVersionItemInterface;

    /**
     * @param int $parentId
     * @param string $oldExternalHash
     * @param string $updatedAt
     * @param int $page
     * @param int $limit
     * @return array
     */
    public function getIdentitiesForNewestVersions(int $parentId, string $oldExternalHash, string $updatedAt, int $page = 1, int $limit = 10000): iterable;

    /**
     * @param array $values
     * @param array $uniqueBy
     * @return IntegrationVersionItemRepositoryInterface
     */
    public function multiCreateOrUpdate(array $values, array $uniqueBy): IntegrationVersionItemRepositoryInterface;

    /**
     * @param array $ids
     * @return IntegrationVersionItemRepositoryInterface
     */
    public function deleteByIds(array $ids): IntegrationVersionItemRepositoryInterface;

    /***
     * @param array $values
     * @return mixed
     */
    public function updateAll(array $values): IntegrationVersionItemRepositoryInterface;

    /**
     * @param int $parentId
     * @return IntegrationVersionItemRepositoryInterface
     */
    public function setStatusDeletedIfNotSuccess(int $parentId): IntegrationVersionItemRepositoryInterface;
}
