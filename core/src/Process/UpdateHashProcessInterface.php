<?php

namespace IntegrationVersion\Core\Process;

use IntegrationVersion\Core\Model\SourceInterface;

interface UpdateHashProcessInterface
{
    public function execute(SourceInterface $source): void;
}
