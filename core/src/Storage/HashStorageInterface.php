<?php

namespace IntegrationVersion\Core\Storage;

use IntegrationVersion\Core\Model\HashInterface;
use IntegrationVersion\Core\Model\SourceInterface;

interface HashStorageInterface
{
    public function get(string|integer $id): HashInterface;

    public function getBySource(SourceInterface $source): HashInterface;

    public function create(HashInterface $hash): HashStorageInterface;

    public function update(HashInterface $hash): HashStorageInterface;

    public function delete(string|integer $id): HashStorageInterface;
}
