<?php

namespace core\src\Service;

use IntegrationHelper\IntegrationVersion\Model\SourceInterface;
use IntegrationHelper\IntegrationVersion\Process\ProcessingNewHashInterface;

interface SourceVersionHashManagerInterface
{
    public function execute(SourceInterface $source, ProcessingNewHashInterface $processingNewHashCallback);
}
