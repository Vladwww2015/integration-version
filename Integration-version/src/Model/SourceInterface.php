<?php

namespace IntegrationHelper\IntegrationVersion\Model;

interface SourceInterface
{
    public function getId();

    public function getName(): string;

    public function getTable(): string;

    public function getIdentityColumn(): string;

    public function setId(string|int $id): SourceInterface;

    public function setName(string $name): SourceInterface;

    public function setTable(string $table): SourceInterface;

    public function setIdentityColumn(string $identityColumn): SourceInterface;
}
