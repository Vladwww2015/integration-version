<?php

namespace IntegrationVersion\Core\Storage;

use IntegrationVersion\Core\Model\SourceInterface;

interface SourceStorageInterface
{
    /**
     * @param string|integer $id
     * @return SourceInterface
     */
    public function get(string|integer $id): SourceInterface;

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
     * @param string|integer $id
     * @return SourceStorageInterface
     */
    public function delete(string|integer $id): SourceStorageInterface;
}
