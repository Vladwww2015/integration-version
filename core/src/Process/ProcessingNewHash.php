<?php

namespace IntegrationVersion\Core\Process;

use IntegrationVersion\Core\Model\CollectionInterface;
use IntegrationVersion\Core\Model\SourceInterface;
use IntegrationVersion\Server\Storage\ItemStorageInterface;
use IntegrationVersion\Core\Process\ProcessingNewHashInterface;

/**
 *
 */
class ProcessingNewHash implements ProcessingNewHashInterface
{
    /**
     * @param ItemStorageInterface $itemStorage
     * @param CollectionInterface $collection
     */
    public function __construct(
        protected ItemStorageInterface $itemStorage,
        protected CollectionInterface $collection
    ) {}

    /**
     * @param SourceInterface $source
     * @param string $newHash
     * @return bool
     */
    public function execute(SourceInterface $source, string $newHash): bool
    {
        foreach ($this->collection as $item) {
            TODO ... figure out how to use same hash for multiprocessing import
                //compare input collection with collection from storage, update items(batch) hash or skip
        }
    }
}
