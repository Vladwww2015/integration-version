<?php

namespace IntegrationHelper\IntegrationVersion\Model;

interface IntegrationVersionItemInterface
{
    public const STATUS_PROCESS = 'process';

    public const STATUS_SUCCESS = 'success';

    public const STATUS_DELETED = 'deleted';

    public function getIdValue(): int;
    public function setIdValue(int $id): IntegrationVersionItemInterface;

    public function getParentId(): int;
    public function setParentId(int $parentId): IntegrationVersionItemInterface;

    public function getStatus(): string;

    public function setStatus(string $status): IntegrationVersionItemInterface;

    public function getVersionHash(): string;
    public function setVersionHash(string $versionHash): IntegrationVersionItemInterface;

    public function getIdentityValue(): string;
    public function setIdentityValue(string $identityValue): IntegrationVersionItemInterface;

    public function getChecksum(): string;
    public function setChecksum(string $checksum): IntegrationVersionItemInterface;

    public function getUpdatedAtValue(): string;
    public function setUpdatedAtValue(string $updatedAt): IntegrationVersionItemInterface;
}
