<?php

namespace IntegrationHelper\IntegrationVersion\Storage;

use IntegrationHelper\IntegrationVersion\Model\HashInterface;
use IntegrationHelper\IntegrationVersion\Model\SourceInterface;

interface HashStorageInterface
{
    public function get(string|int $id): HashInterface;

    public function getBySource(SourceInterface $source): HashInterface;

    public function create(HashInterface $hash): HashStorageInterface;

    public function update(HashInterface $hash): HashStorageInterface;

    public function delete(string|int $id): HashStorageInterface;
}
