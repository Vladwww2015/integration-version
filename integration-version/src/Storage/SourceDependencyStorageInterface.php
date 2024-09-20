<?php

namespace IntegrationHelper\IntegrationVersion\Storage;

use IntegrationHelper\IntegrationVersion\Model\SourceDependencyInterface;

interface SourceDependencyStorageInterface
{
    /**
     * @param string|int $id
     * @return SourceDependencyInterface
     */
    public function get(string|int $id): SourceDependencyInterface;

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
     * @param string|int $id
     * @return SourceDependencyStorageInterface
     */
    public function delete(string|int $id): SourceDependencyStorageInterface;
}
