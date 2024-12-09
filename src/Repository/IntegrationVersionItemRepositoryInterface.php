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
     * @param string $oldHashDateTime
     * @param int $page
     * @param int $limit
     * @return array
     */
    public function getIdentitiesForNewestVersions(int $parentId, string $oldExternalHash, string $oldHashDateTime, int $page = 1, int $limit = 10000): iterable;

    /**
     * @param int $parentId
     * @param array $identitiesForCheck
     * @param string $identityColumn
     * @return array
     */
    public function getDeletedIdentities(int $parentId, array $identitiesForCheck, string $identityColumn): array;

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
     * @param int $parentId
     * @return mixed
     */
    public function updateAll(array $values, int $parentId): IntegrationVersionItemRepositoryInterface;

    /**
     * @param int $parentId
     * @return IntegrationVersionItemRepositoryInterface
     */
    public function setStatusDeletedIfNotSuccess(int $parentId): IntegrationVersionItemRepositoryInterface;
}
