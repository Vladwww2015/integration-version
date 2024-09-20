<?php

namespace IntegrationHelper\IntegrationVersion\Process;

use IntegrationHelper\IntegrationVersion\Model\CollectionInterface;
use IntegrationHelper\IntegrationVersion\Model\SourceInterface;

interface ProcessingNewHashInterface
{
    public function execute(SourceInterface $source, string $newHash): bool;

    public function getCollection(): CollectionInterface;
}
