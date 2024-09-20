<?php

namespace IntegrationHelper\IntegrationVersion\Storage;

use IntegrationHelper\IntegrationVersion\Model\HashHistoryInterface;
use IntegrationHelper\IntegrationVersion\Model\SourceInterface;

interface HashHistoryStorageInterface
{
    /**
     * @param SourceInterface $source
     * @return HashHistoryInterface[]
     */
    public function getList(SourceInterface $source): array;

    /**
     * @param string|int $id
     * @return HashHistoryInterface
     */
    public function get(string|int $id): HashHistoryInterface;

    /**
     * @param HashHistoryInterface $hash
     * @return HashHistoryStorageInterface
     */
    public function create(HashHistoryInterface $hash): HashHistoryStorageInterface;

    /**
     * @param HashHistoryInterface $hash
     * @return HashHistoryStorageInterface
     */
    public function update(HashHistoryInterface $hash): HashHistoryStorageInterface;

    /**
     * @param string|int $id
     * @return HashHistoryStorageInterface
     */
    public function delete(string|int $id): HashHistoryStorageInterface;
}
