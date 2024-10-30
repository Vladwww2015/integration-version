<?php

namespace IntegrationHelper\IntegrationVersion;

use IntegrationHelper\IntegrationVersion\Context;
use IntegrationHelper\IntegrationVersion\Exceptions\IntegrationVersionIsReady;
use IntegrationHelper\IntegrationVersion\Exceptions\IntegrationVersionProcess;
use IntegrationHelper\IntegrationVersion\Exceptions\IntegrationVersionNotFound;
use IntegrationHelper\IntegrationVersion\IntegrationVersionResultOutput;
use IntegrationHelper\IntegrationVersion\Model\IntegrationVersionInterface;
use IntegrationHelper\IntegrationVersion\IntegrationVersionManagerInterface;

class IntegrationVersionManager implements IntegrationVersionManagerInterface
{
    public function executeOne(string $source, mixed $identityValue): IntegrationVersionResultOutput
    {
        $repository = Context::getInstance()->getIntegrationVersionRepository();
        $item = $repository->getItemBySource($source);
        if(!$item->getIdValue()) throw new IntegrationVersionNotFound($source);

        $hash = Context::getInstance()->getHashGenerator()->generate($source);

        try {
            $result = Context::getInstance()->getIntegrationVersionItemManager()
                ->executeOne(
                    $item->getIdValue(),
                    $item->getTableName(),
                    $item->getIdentityColumn(),
                    $identityValue,
                    $item->getChecksumColumns(),
                    $hash
                );

            if($result->getResult()) {
                $item->setHash($hash);
                $repository->updateItem($item);
            }

            $this->setReadyStatus($source);
        } catch (\Exception $e) {
            $this->setFailedStatus($source);
            throw $e;
        }

        return $result;
    }

    public function executeFull(string $source, int $limit = 10000): IntegrationVersionResultOutput
    {
        $this->checkReadyToProcessStatus($source);

        $this->setProcessStatus($source);
        $repository = Context::getInstance()->getIntegrationVersionRepository();
        $item = $repository->getItemBySource($source);
        if(!$item->getIdValue()) throw new IntegrationVersionNotFound($source);

        $hash = Context::getInstance()->getHashGenerator()->generate($source);

        try {
            $result = Context::getInstance()->getIntegrationVersionItemManager()
                ->executeFull(
                    $item->getIdValue(),
                    $item->getTableName(),
                    $item->getIdentityColumn(),
                    $item->getChecksumColumns(),
                    $hash,
                    $limit,
                    function (int $parentId) {
                        return $this->isIndexMustBeStopped($parentId);
                    }
                );

            if($result->getResult()) {
                $item->setHash($hash);
                $repository->updateItem($item);
            }

            $this->setReadyStatus($source);
        } catch (\Exception $e) {
            $this->setFailedStatus($source);
            throw $e;
        }

        return $result;
    }

    public function createOrUpdate(
        string $source,
        string $table,
        string $identityColumn,
        array $checksumColumns
    ): IntegrationVersionInterface
    {
        $dateTime = Context::getInstance()->getDateTime();
        $item = $this->getItem($source);
        if(!$item->getIdValue()) {
            $item = $this->createItem([
                'source' => $source,
                'table_name' => $table,
                'identity_column' => $identityColumn,
                'checksum_columns' => $checksumColumns,
                'updated_at' => $dateTime->getNow(),
                'status' => IntegrationVersionInterface::STATUS_READY
            ]);

            return $item;
        }
        $item
            ->setSource($source)
            ->setTableName($table)
            ->setIdentityColumn($identityColumn)
            ->setChecksumColumns($checksumColumns)
            ->setUpdatedAtValue($dateTime->getNow());

        $this->updateItem($item);

        return $item;
    }

    public function setPendingStatus(string $source): void
    {
        $item = $this->getItem($source);
        $item->setStatus(IntegrationVersionInterface::STATUS_PENDING);
        $this->updateItem($item);
    }

    protected function isIndexMustBeStopped(int $id): bool
    {
        $repository = Context::getInstance()->getIntegrationVersionRepository();
        $item = $repository->getItemById($id);

        if($item->getStatus() === IntegrationVersionInterface::STATUS_PENDING) return true;

        return false;
    }

    public function setProcessStatus(string $source): void
    {
        $item = $this->getItem($source);
        $item->setStatus(IntegrationVersionInterface::STATUS_PROCESS);
        $this->updateItem($item);
    }

    public function setFailedStatus(string $source): void
    {
        $item = $this->getItem($source);
        $item->setStatus(IntegrationVersionInterface::STATUS_FAILED);
        $this->updateItem($item);
    }

    public function setReadyStatus(string $source): void
    {
        $item = $this->getItem($source);
        $item->setStatus(IntegrationVersionInterface::STATUS_READY);
        $this->updateItem($item);
    }

    protected function checkReadyToProcessStatus(string $source)
    {
        $item = $this->getItem($source);
        if($item->getStatus() === IntegrationVersionInterface::STATUS_PROCESS) throw new IntegrationVersionProcess($source);
        if($item->getStatus() === IntegrationVersionInterface::STATUS_READY) throw new IntegrationVersionIsReady($source);
    }

    protected function getItem(string $source)
    {
        $repository = Context::getInstance()->getIntegrationVersionRepository();
        return $repository->getItemBySource($source);
    }

    protected function updateItem(IntegrationVersionInterface $item)
    {
        $repository = Context::getInstance()->getIntegrationVersionRepository();
        $repository->updateItem($item);
    }

    protected function createItem(array $data): IntegrationVersionInterface
    {
        $repository = Context::getInstance()->getIntegrationVersionRepository();
        return $repository->createItem($data);
    }
}
