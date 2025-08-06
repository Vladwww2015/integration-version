<?php

namespace IntegrationHelper\IntegrationVersion;

use IntegrationHelper\IntegrationVersion\Model\IntegrationVersionItemInterface;
use IntegrationHelper\IntegrationVersion\Repository\IntegrationVersionItemRepositoryInterface;

class IntegrationVersionItemManager implements IntegrationVersionItemManagerInterface
{
    /**
     * @param string $sourceCode
     * @param int $parentId
     * @param string $table
     * @param string $identityColumn
     * @param mixed $identityValue
     * @param array $columns
     * @param string $newHash
     * @param string $hashDateTime
     * @return IntegrationVersionResultOutput
     */
    public function executeOne(
        string $sourceCode,
        int $parentId,
        string $table,
        string $identityColumn,
        mixed $identityValue,
        array $columns,
        string $newHash,
        string $hashDateTime
    ): IntegrationVersionResultOutput
    {
        $resultFlag = false;
        $getter = Context::getInstance()->getGetterParentItemCollection($sourceCode);
        $repository = Context::getInstance()->getIntegrationVersionItemRepository();
        $items = $getter->getItem($table, $identityColumn, $identityValue, $columns);

        if($items->count()) {
            if($this->execute($parentId, $items, $repository, $identityColumn, $columns, $newHash, $hashDateTime)) {
                $resultFlag = true;
            }
        }

        $repository->setStatusDeletedIfNotSuccess($parentId, $identityValue);

        $result = new IntegrationVersionResultOutput();
        $result->setResult($resultFlag);

        return $result;
    }

    /**
     * @param string $sourceCode
     * @param int $parentId
     * @param string $table
     * @param string $identityColumn
     * @param array $columns
     * @param string $newHash
     * @param string $hashDateTime
     * @param int $limit
     * @param \Closure|null $isMustBeStoppedCallback
     * @return IntegrationVersionResultOutput
     */
    public function executeFull(
        string $sourceCode,
        int $parentId,
        string $table,
        string $identityColumn,
        array $columns,
        string $newHash,
        string $hashDateTime,
        int $limit = 50000,
        \Closure $isMustBeStoppedCallback = null
    ): IntegrationVersionResultOutput
    {
        $resultFlag = false;
        $getter = Context::getInstance()->getGetterParentItemCollection($sourceCode);
        $repository = Context::getInstance()->getIntegrationVersionItemRepository();
        $repository->updateAll(['status' => IntegrationVersionItemInterface::STATUS_PROCESS], $parentId);
        $page = 1;
        while(true) {
            $items = $getter->getItems($table, $identityColumn, $columns, $page++, $limit);

            if(is_callable($isMustBeStoppedCallback) && $isMustBeStoppedCallback($parentId)) break;

            if(!$items->count()) break;

            if($this->execute($parentId, $items, $repository, $identityColumn, $columns, $newHash, $hashDateTime)) {
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
        string $hashDateTime
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
                    'updated_at' => $hashDateTime,
                    'hash_date_time' => $hashDateTime
                ];
                $resultFlag = true;
                continue;
            }
            if($integrationVersionItem->getChecksum() !== $checksum) {
                $dataToUpdate[] = [
                    'identity_value' => $identityValue,
                    'parent_id' => $parentId,
                    'checksum' => $checksum,
                    'status' => IntegrationVersionItemInterface::STATUS_SUCCESS,
                    'version_hash' => $newHash,
                    'hash_date_time' => $hashDateTime,
                    'updated_at' => $hashDateTime
                ];
                $resultFlag = true;
                continue;
            }

            if($integrationVersionItem->getChecksum() === $checksum) {
                $dataChecked[] = [
                    'parent_id' => $parentId,
                    'identity_value' => $identityValue,
                    'status' => IntegrationVersionItemInterface::STATUS_SUCCESS,
                ];

            }
        }

        if ($dataToCreate) {
            $this->callWrapQueryDb('createItems', $dataToCreate);
        }

        if($dataToUpdate) {
            $this->callWrapQueryDb('updateItems', $dataToCreate);
        }

        if($dataChecked) {
            $this->callWrapQueryDb('updateItems', $dataChecked);
        }

        return $resultFlag;
    }

    /**
     * @param string $method
     * @param array $data
     * @param int $i
     * @return void
     * @throws \Exception
     */
    protected function callWrapQueryDb(string $method, array $data, int $i = 0)
    {
        foreach (array_chunk($data, 300) as $chunk) {
            try{
                $this->{$method}($chunk, $i);
            } catch (\Exception $e) {
                if($i++ > 5) throw $e;

                sleep(5 * $i);

                $this->{$method}($chunk, $i);
            }
        }
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

    public function getIdentitiesForNewestVersions(int $parentId, string $oldExternalHash, string $oldHashDateTime, int $page = 1, int $limit = 10000): iterable
    {
        $repository = Context::getInstance()->getIntegrationVersionItemRepository();

        return $repository->getIdentitiesForNewestVersions($parentId, $oldExternalHash, $oldHashDateTime, $page, $limit);
    }

    /**
     * @param int $parentId
     * @param string $oldExternalHash
     * @param string $oldHashDateTime
     * @return int
     */
    public function getIdentitiesTotalForNewestVersions(
        int $parentId,
        string $oldExternalHash,
        string $oldHashDateTime
    ): int
    {
        $repository = Context::getInstance()->getIntegrationVersionItemRepository();

        return $repository->getIdentitiesTotalForNewestVersions($parentId, $oldExternalHash, $oldHashDateTime);
    }

    /**
     * @param int $parentId
     * @param array $identitiesForCheck
     * @param string $identityColumn
     * @return array
     */
    public function getDeletedIdentities(
        int $parentId,
        array $identitiesForCheck,
        string $identityColumn
    ): array
    {
        $repository = Context::getInstance()->getIntegrationVersionItemRepository();

        return $repository->getDeletedIdentities($parentId, $identitiesForCheck, $identityColumn);
    }

    public function getItemsWithDeletedStatus(): iterable
    {
        $repository = Context::getInstance()->getIntegrationVersionItemRepository();

        return $repository->getItemsWithDeletedStatus();
    }
}
