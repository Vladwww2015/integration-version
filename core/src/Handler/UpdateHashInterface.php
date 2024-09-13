<?php

namespace IntegrationVersion\Core\Handler;

use IntegrationVersion\Core\Model\HashInterface;
use IntegrationVersion\Core\Model\SourceInterface;
use IntegrationVersion\Core\Storage\HashStorageInterface;

interface UpdateHashInterface
{
    public function execute(HashInterface $hashModel, SourceInterface $source, string $newHash): void;
}
