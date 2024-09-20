<?php

namespace IntegrationHelper\IntegrationMaster\Handlers;

use IntegrationHelper\IntegrationMaster\Model\IntegrationMasterExceptionInterface;

interface IntegrationMasterExceptionHandlerInterface
{
    public function save(int $masterId, array $entityIdentities): void;

    public function delete(int $masterId, array $entityIdentities): void;

    /**
     * @param int $masterId
     * @param array $entityIdentities
     * @return IntegrationMasterExceptionInterface[]
     */
    public function find(int $masterId, array $entityIdentities = []): array;

    public function read(int $id): IntegrationMasterExceptionInterface;
}
