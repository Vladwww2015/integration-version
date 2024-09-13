<?php

namespace IntegrationVersion\Core\Storage;

use IntegrationVersion\Core\Model\SourceDependencyInterface;

interface SourceDependencyStorageInterface
{
    /**
     * @param string|integer $id
     * @return SourceDependencyInterface
     */
    public function get(string|integer $id): SourceDependencyInterface;

    /**
     * @param string $source
     * @return SourceDependencyInterface[]
     */
    public function getBySource(string $source): array;

    /**
     * @param string $parentSource
     * @return SourceDependencyInterface
     */
    public function getByParentSource(string $parentSource): SourceDependencyInterface;

    /**
     * @param SourceDependencyInterface $sourceDependency
     * @return SourceDependencyStorageInterface
     */
    public function create(SourceDependencyInterface $sourceDependency): SourceDependencyStorageInterface;

    /**
     * @param SourceDependencyInterface $sourceDependency
     * @return SourceDependencyStorageInterface
     */
    public function update(SourceDependencyInterface $sourceDependency): SourceDependencyStorageInterface;

    /**
     * @param string|integer $id
     * @return SourceDependencyStorageInterface
     */
    public function delete(string|integer $id): SourceDependencyStorageInterface;
}
