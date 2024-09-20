<?php

namespace IntegrationHelper\IntegrationVersion\Process;

use IntegrationHelper\IntegrationVersion\Model\CollectionInterface;
use IntegrationHelper\IntegrationVersion\Model\SourceInterface;
use IntegrationHelper\IntegrationVersion\Storage\ItemStorageInterface;
use IntegrationHelper\IntegrationVersion\Process\ProcessingNewHashInterface;

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
        foreach ($this->getCollection() as $item) {
//            TODO ... figure out how to use same hash for multiprocessing import
                //compare input collection with collection from storage, update items(batch) hash or skip
        }
    }

    public function getCollection(): CollectionInterface
    {
        return $this->collection;
    }
}
