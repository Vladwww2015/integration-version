<?php

namespace core\src\Service;

use IntegrationVersion\Core\Model\SourceInterface;
use IntegrationVersion\Core\Process\ProcessingNewHashInterface;

interface SourceVersionHashManagerInterface
{
    public function execute(SourceInterface $source, ProcessingNewHashInterface $processingNewHashCallback);
}
