<?php

namespace IntegrationHelper\IntegrationVersion\Model;

interface IntegrationVersionInterface
{
    public const STATUS_READY = 'ready'; //It means cur integration version can works with integration

    public const STATUS_PROCESS = 'process'; //It means cur integration version in process rewrite and re-calculate checksums and hash and disabled to import/export

    public const STATUS_PENDING = 'pending'; //It means cur integration version pending reindex process with checksums and hash and disabled to import/export

    public const STATUS_FAILED = 'failed'; //It means cur integration version pending reindex process with checksums and hash and disabled to import/export

    public function getId(): int;
    public function setId(int $id): IntegrationVersionInterface;

    public function getSource(): string;
    public function setSource(string $source): IntegrationVersionInterface;

    public function getTableName(): string;
    public function setTableName(string $tableName): IntegrationVersionInterface;

    public function getHash(): string;
    public function setHash(string $hash): IntegrationVersionInterface;

    public function getIdentityColumn(): string;
    public function setIdentityColumn(string $identityColumn): IntegrationVersionInterface;

    public function getStatus(): string;
    public function setStatus(string $status): IntegrationVersionInterface;

    public function getChecksumColumns(): array;
    public function setChecksumColumns(array $columns): IntegrationVersionInterface;

    public function getUpdatedAtValue(): string;
    public function setUpdatedAtValue(string $updatedAt): IntegrationVersionInterface;
}
