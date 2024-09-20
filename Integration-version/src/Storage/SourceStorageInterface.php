<?php

namespace IntegrationHelper\IntegrationVersion\Storage;

use IntegrationHelper\IntegrationVersion\Model\SourceInterface;

interface SourceStorageInterface
{
    /**
     * @param string|int $id
     * @return SourceInterface
     */
    public function get(string|int $id): SourceInterface;

    /**
     * @param string $source
     * @return SourceInterface
     */
    public function getBySource(string $source): SourceInterface;

    /**
     * @param SourceInterface $source
     * @return SourceStorageInterface
     */
    public function create(SourceInterface $source): SourceStorageInterface;

    /**
     * @param SourceInterface $source
     * @return SourceStorageInterface
     */
    public function update(SourceInterface $source): SourceStorageInterface;

    /**
     * @param string|int $id
     * @return SourceStorageInterface
     */
    public function delete(string|int $id): SourceStorageInterface;
}
