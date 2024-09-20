<?php

namespace IntegrationHelper\IntegrationVersion\Core;

use IntegrationHelper\IntegrationVersion\DateTimeInterface;
use IntegrationHelper\IntegrationVersion\DateTimeInterface;
use IntegrationHelper\IntegrationVersion\Storage\HashHistoryStorageInterface;
use IntegrationHelper\IntegrationVersion\Storage\HashStorageInterface;
use IntegrationHelper\IntegrationVersion\Storage\SourceDependencyStorageInterface;
use IntegrationHelper\IntegrationVersion\Storage\SourceStorageInterface;
use IntegrationHelper\IntegrationVersion\Storage\ItemStorageInterface;

class Context
{
    /**
     * @param \IntegrationHelper\IntegrationVersion\DateTimeInterface $dateTime
     * @param HashStorageInterface $hashStorage
     * @param HashHistoryStorageInterface $hashHistoryStorage
     * @param ItemStorageInterface $itemStorage
     * @param SourceStorageInterface $sourceStorage
     * @param SourceDependencyStorageInterface $sourceDependencyStorage
     */
    public function __construct(
        protected DateTimeInterface $dateTime,
        protected HashStorageInterface $hashStorage,
        protected HashHistoryStorageInterface $hashHistoryStorage,
        protected ItemStorageInterface $itemStorage,
        protected SourceStorageInterface $sourceStorage,
        protected SourceDependencyStorageInterface $sourceDependencyStorage
    ){}

    /**
     * @return \IntegrationHelper\IntegrationVersion\DateTimeInterface
     */
    public function getDateTime(): DateTimeInterface
    {
        return $this->dateTime;
    }

    /**
     * @return HashStorageInterface
     */
    public function getHashStorage(): HashStorageInterface
    {
        return $this->hashStorage;
    }

    /**
     * @return HashHistoryStorageInterface
     */
    public function getHashHistoryStorage(): HashHistoryStorageInterface
    {
        return $this->hashHistoryStorage;
    }

    /**
     * @return ItemStorageInterface
     */
    public function getItemStorage(): ItemStorageInterface
    {
        return $this->itemStorage;
    }

    /**
     * @return SourceStorageInterface
     */
    public function getSourceStorage(): SourceStorageInterface
    {
        return $this->sourceStorage;
    }

    /**
     * @return SourceDependencyStorageInterface
     */
    public function getSourceDependencyStorage(): SourceDependencyStorageInterface
    {
        return $this->sourceDependencyStorage;
    }
}
