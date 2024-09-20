<?php

namespace IntegrationHelper\IntegrationVersion\Process;

use IntegrationHelper\IntegrationVersion\Handler\AddHashToHistoryInterface;
use IntegrationHelper\IntegrationVersion\Handler\UpdateHash;
use IntegrationHelper\IntegrationVersion\Model\SourceInterface;
use IntegrationHelper\IntegrationVersion\Storage\HashStorageInterface;

/**
 *
 */
class UpdateHashProcess implements UpdateHashProcessInterface
{
    /**
     * @param UpdateHash $updateHash
     * @param HashStorageInterface $hashStorage
     * @param AddHashToHistoryInterface $addHashToHistory
     */
    public function __construct(
        protected UpdateHash $updateHash,
        protected HashStorageInterface $hashStorage,
        protected AddHashToHistoryInterface $addHashToHistory
    ) {}

    /**
     * @param SourceInterface $source
     * @param string $newHash
     * @return void
     */
    public function execute(SourceInterface $source, string $newHash): void
    {
        $hashModel = $this->hashStorage->getBySource($source);
        if($hashModel->getId()) {
            $this->addHashToHistory->execute($hashModel);
            $this->updateHash->execute($hashModel, $source, $newHash);
            return;
        }
        $this->updateHash->execute($hashModel, $source, $newHash);
    }
}
