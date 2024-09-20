<?php

namespace IntegrationHelper\IntegrationVersion\Handler;

use IntegrationHelper\IntegrationVersion\Model\HashInterface;
use IntegrationHelper\IntegrationVersion\Model\SourceInterface;
use IntegrationHelper\IntegrationVersion\Storage\HashStorageInterface;

interface UpdateHashInterface
{
    public function execute(HashInterface $hashModel, SourceInterface $source, string $newHash): void;
}
