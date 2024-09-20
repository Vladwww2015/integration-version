<?php

namespace core\src\Service;

use IntegrationHelper\IntegrationVersion\Generator\HashGeneratorInterface;
use IntegrationHelper\IntegrationVersion\Model\SourceInterface;
use IntegrationHelper\IntegrationVersion\Process\ProcessingNewHashInterface;
use IntegrationHelper\IntegrationVersion\Process\UpdateHashProcessInterface;

/**
 *
 */
class SourceVersionHashManager implements SourceVersionHashManagerInterface
{
    /**
     * @param UpdateHashProcessInterface $updateHashProcess
     * @param HashGeneratorInterface $hashGenerator
     */
    public function __construct(
        protected UpdateHashProcessInterface $updateHashProcess,
        protected HashGeneratorInterface $hashGenerator
    ) {}

    /**
     * @param SourceInterface $source
     * @param ProcessingNewHashInterface $processingNewHashCallback
     * @return void
     */
    public function execute(
        SourceInterface $source,
        ProcessingNewHashInterface $processingNewHashCallback
    ) {
        $newHash = $this->hashGenerator->generate($source);
        $result = $processingNewHashCallback->execute($source, $newHash);
        if($result) {
            $this->updateHashProcess->execute($source, $newHash);
        }
    }
}
