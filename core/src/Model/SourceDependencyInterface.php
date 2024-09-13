<?php

namespace IntegrationVersion\Core\Model;

interface SourceDependencyInterface
{
    public function getId();

    public function getSource(): string;

    public function getParentSource(): string;

    public function getParentTable(): string;

    public function getParentIdentityColumn(): string;

    public function setId(string|integer $id): SourceDependencyInterface;

    public function setSource(string $source): SourceDependencyInterface;

    public function setParentSource(string $parentSource): SourceDependencyInterface;

    public function setParentTable(string $parentTable): SourceDependencyInterface;

    public function setParentIdentityColumn(string $parentIdentityColumn): SourceDependencyInterface;
}
