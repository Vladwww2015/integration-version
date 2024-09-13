<?php

namespace IntegrationVersion\Core\Process;

use IntegrationVersion\Core\Model\SourceInterface;

interface ProcessingNewHashInterface
{
    public function execute(SourceInterface $source, string $newHash): bool;

    public function setCollection();
}
