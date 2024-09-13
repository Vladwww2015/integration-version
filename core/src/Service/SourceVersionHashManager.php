<?php

namespace core\src\Service;

use IntegrationVersion\Core\Generator\HashGeneratorInterface;
use IntegrationVersion\Core\Model\SourceInterface;
use IntegrationVersion\Core\Process\ProcessingNewHashInterface;
use IntegrationVersion\Core\Process\UpdateHashProcessInterface;

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
        $result = $processingNewHashCallback->execute($newHash);
        if($result) {
            $this->updateHashProcess->execute($processingNewHashCallback);
        }
    }
}
