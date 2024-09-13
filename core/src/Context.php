<?php

namespace IntegrationVersion\Core;

use IntegrationVersion\Core\DateTimeInterface;
use IntegrationVersion\Core\DateTimeInterface;
use IntegrationVersion\Core\Storage\HashHistoryStorageInterface;
use IntegrationVersion\Core\Storage\HashStorageInterface;
use IntegrationVersion\Core\Storage\SourceDependencyStorageInterface;
use IntegrationVersion\Core\Storage\SourceStorageInterface;
use IntegrationVersion\Core\Storage\ItemStorageInterface;

class Context
{
    /**
     * @param \IntegrationVersion\Core\DateTimeInterface $dateTime
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
     * @return \IntegrationVersion\Core\DateTimeInterface
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
