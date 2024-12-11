<?php

namespace IntegrationHelper\IntegrationVersion;

use IntegrationHelper\IntegrationVersion\IntegrationVersionResultOutput;

interface IntegrationVersionItemManagerInterface
{
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
        string $hashDateTime,
        int $limit = 50000,
        \Closure $isMustBeStoppedCallback = null
    ): IntegrationVersionResultOutput;

    /**
     * @param int $parentId
     * @param string $table
     * @param string $identityColumn
     * @param mixed $identityValue
     * @param array $columns
     * @param string $newHash
     * @return \IntegrationHelper\IntegrationVersion\IntegrationVersionResultOutput
     */
    public function executeOne(
        int $parentId,
        string $table,
        string $identityColumn,
        mixed $identityValue,
        array $columns,
        string $newHash,
        string $hashDateTime
    ): IntegrationVersionResultOutput;

    /**
     * @param int $parentId
     * @param string $oldExternalHash
     * @param string $oldHashDateTime
     * @param int $page
     * @param int $limit
     * @return array
     */
    public function getIdentitiesForNewestVersions(
        int $parentId,
        string $oldExternalHash,
        string $oldHashDateTime,
        int $page = 1,
        int $limit = 50000
    ): iterable;

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
    ): array;

    /**
     * @return iterable
     */
    public function getItemsWithDeletedStatus(): iterable;
}
