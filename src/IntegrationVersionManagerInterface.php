<?php

namespace IntegrationHelper\IntegrationVersion;

use IntegrationHelper\IntegrationVersion\Model\IntegrationVersionInterface;

interface IntegrationVersionManagerInterface
{
    public function executeFull(string $source, int $limit = 10000): IntegrationVersionResultOutput;

    public function executeOne(string $source, mixed $identityValue): IntegrationVersionResultOutput;

    public function createOrUpdate(
        string $source,
        string $table,
        string $identityColumn,
        array $checksumColumns
    ): IntegrationVersionInterface;

    public function setPendingStatus(string $source): void;

    public function getDeletedIdentities(
        string $source,
        array $identities
    ): array;

    /**
     * @param string $source
     * @param string $hash
     * @param string $hashDateTime
     * @return void
     */
    public function saveNewHash(string $source, string $hash, string $hashDateTime): void;
}
