<?php

namespace IntegrationVersion\Core\Process;

use IntegrationVersion\Core\Handler\AddHashToHistoryInterface;
use IntegrationVersion\Core\Handler\UpdateHash;
use IntegrationVersion\Core\Model\SourceInterface;
use IntegrationVersion\Core\Storage\HashStorageInterface;

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
            $this->updateHash->execute($hashModel, $source);
            return;
        }
        $this->updateHash->execute($hashModel, $source);
    }
}
