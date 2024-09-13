<?php

namespace IntegrationVersion\Core\Storage;

use IntegrationVersion\Core\Model\HashHistoryInterface;
use IntegrationVersion\Core\Model\SourceInterface;

interface HashHistoryStorageInterface
{
    /**
     * @param SourceInterface $source
     * @return HashHistoryInterface[]
     */
    public function getList(SourceInterface $source): array;

    /**
     * @param string|integer $id
     * @return HashHistoryInterface
     */
    public function get(string|integer $id): HashHistoryInterface;

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
     * @param string|integer $id
     * @return HashHistoryStorageInterface
     */
    public function delete(string|integer $id): HashHistoryStorageInterface;
}
