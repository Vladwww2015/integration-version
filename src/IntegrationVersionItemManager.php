<?php

namespace IntegrationHelper\IntegrationVersion;

use IntegrationHelper\IntegrationVersion\Model\IntegrationVersionItemInterface;
use IntegrationHelper\IntegrationVersion\Repository\IntegrationVersionItemRepositoryInterface;

class IntegrationVersionItemManager implements IntegrationVersionItemManagerInterface
{
    /**
     * @param int $parentId
     * @param string $table
     * @param string $identityColumn
     * @param mixed $identityValue
     * @param array $columns
     * @param string $newHash
     * @return IntegrationVersionResultOutput
     */
    public function executeOne(
        int $parentId,
        string $table,
        string $identityColumn,
        mixed $identityValue,
        array $columns,
        string $newHash
    ): IntegrationVersionResultOutput
    {
        $resultFlag = false;
        $dateTime = Context::getInstance()->getDateTime();
        $dateTimeNow = $dateTime->getNow();
        $getter = Context::getInstance()->getGetterParentItemCollection();
        $repository = Context::getInstance()->getIntegrationVersionItemRepository();
        $repository->updateAll(['status' => IntegrationVersionItemInterface::STATUS_PROCESS]);
        $items = $getter->getItem($table, $identityColumn, $identityValue, $columns);

        if($items->count()) {
            if($this->execute($parentId, $items, $repository, $identityColumn, $columns, $newHash, $dateTimeNow)) {
                $resultFlag = true;
            }
        }

        $repository->setStatusDeletedIfNotSuccess($parentId);

        $result = new IntegrationVersionResultOutput();
        $result->setResult($resultFlag);

        return $result;
    }

    /**
     * @param int $parentId
     * @param string $table
     * @param string $identityColumn
     * @param array $columns
     * @param string $newHash
     * @param int $limit
     * @param \Closure|null $isMustBeStoppedCallback
     * @return IntegrationVersionResultOutput
     */
    public function executeFull(
        int $parentId,
        string $table,
        string $identityColumn,
        array $columns,
        string $newHash,
        int $limit = 10000,
        \Closure $isMustBeStoppedCallback = null
    ): IntegrationVersionResultOutput
    {
        $resultFlag = false;
        $dateTime = Context::getInstance()->getDateTime();
        $dateTimeNow = $dateTime->getNow();
        $getter = Context::getInstance()->getGetterParentItemCollection();
        $repository = Context::getInstance()->getIntegrationVersionItemRepository();
        $repository->updateAll(['status' => IntegrationVersionItemInterface::STATUS_PROCESS]);
        $page = 1;
        while(true) {
            $items = $getter->getItems($table, $identityColumn, $columns, $page++, $limit);

            if(is_callable($isMustBeStoppedCallback) && $isMustBeStoppedCallback($parentId)) break;

            if(!$items->count()) break;

            if($this->execute($parentId, $items, $repository, $identityColumn, $columns, $newHash, $dateTimeNow)) {
                $resultFlag = true;
            }
        }

        $repository->setStatusDeletedIfNotSuccess($parentId);

        $result = new IntegrationVersionResultOutput();
        $result->setResult($resultFlag);

        return $result;
    }

    /**
     * @param int $parentId
     * @param iterable $items
     * @param IntegrationVersionItemRepositoryInterface $repository
     * @param string $identityColumn
     * @param array $columns
     * @param string $newHash
     * @param string $dateTimeNow
     * @return bool
     */
    protected function execute(
        int $parentId,
        iterable $items,
        IntegrationVersionItemRepositoryInterface $repository,
        string $identityColumn,
        array $columns,
        string $newHash,
        string $dateTimeNow
    ): bool  {
        $resultFlag = false;
        $dataChecked = $dataToCreate = $dataToUpdate = [];

        $identityValues = array_map(fn($item) => $item->{$identityColumn}, $items->toArray());

        $integrationVersionItems = [];
        foreach ($repository->getItems($parentId, $identityValues) as $integrationVersionItem) {
            $integrationVersionItems[$integrationVersionItem->getIdentityValue()] = $integrationVersionItem;
        }

        foreach ($items as $item) {
            $identityValue = $item->{$identityColumn};
            $integrationVersionItem = $integrationVersionItems[$identityValue] ?? false;
            $checksum = $this->getChecksum($columns, $item);
            if(!$integrationVersionItem) {
                $dataToCreate[] = [
                    'parent_id' => $parentId,
                    'status' => IntegrationVersionItemInterface::STATUS_SUCCESS,
                    'version_hash' => $newHash,
                    'identity_value' => $identityValue,
                    'checksum' => $checksum,
                    'updated_at' => $dateTimeNow
                ];
                $resultFlag = true;
                continue;
            }
            if($integrationVersionItem->getChecksum() !== $checksum) {
                $dataToUpdate[] = [
                    'identity_value' => $identityValue,
                    'checksum' => $checksum,
                    'status' => IntegrationVersionItemInterface::STATUS_SUCCESS,
                    'version_hash' => $newHash,
                    'updated_at' => $dateTimeNow
                ];
                $resultFlag = true;
                continue;
            }

            if($integrationVersionItem->getChecksum() === $checksum) {
                $dataChecked[] = [
                    'identity_value' => $identityValue,
                    'status' => IntegrationVersionItemInterface::STATUS_SUCCESS,
                ];

            }
        }

        if($dataToCreate) {
            $this->createItems($dataToCreate);
        }

        if($dataToUpdate) {
            $this->updateItems($dataToUpdate);
        }

        if($dataChecked) {
            $this->updateItems($dataChecked);
        }

        return $resultFlag;
    }

    protected function getChecksum(array $columns, object $item): string
    {
        return md5(implode('|', array_map(function($column) use ($item) {
            return $item->{$column};
        }, $columns)));
    }

    protected function createItems(array $data)
    {
        $repository = Context::getInstance()->getIntegrationVersionItemRepository();
        $repository->multiCreateOrUpdate($data, ['parent_id', 'identity_value']);
    }

    protected function updateItems(array $data)
    {
        $this->createItems($data);
    }

    public function delete(array $ids)
    {
        $repository = Context::getInstance()->getIntegrationVersionItemRepository();
        $repository->deleteByIds($ids);
    }

    public function getIdentitiesForNewestVersions(int $parentId, string $oldExternalHash, string $updatedAt, int $page = 1, int $limit = 10000): iterable
    {
        $repository = Context::getInstance()->getIntegrationVersionItemRepository();

        return $repository->getIdentitiesForNewestVersions($parentId, $oldExternalHash, $updatedAt, $page, $limit);
    }
}
