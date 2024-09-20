<?php

namespace IntegrationHelper\IntegrationVersion\Process;

use IntegrationHelper\IntegrationVersion\Model\SourceInterface;

interface UpdateHashProcessInterface
{
    public function execute(SourceInterface $source, string $newHash): void;
}
