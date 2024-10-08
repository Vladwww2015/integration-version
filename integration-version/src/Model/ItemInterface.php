<?php

namespace IntegrationHelper\IntegrationVersion\Model;

interface ItemInterface
{
    public function getId();

    public function getSource(): string;

    public function getIdentity(): string|int;

    public function getValue(): string;

    public function getVersionHash(): string;

    public function getParentIdentity(): string|int;

    public function setId($id): ItemInterface;

    public function setSource(string $source): ItemInterface;

    public function setIdentity(string|int $identity): ItemInterface;

    public function setValue(string $value): ItemInterface;

    public function setVersionHash(string $versionHash): ItemInterface;

    public function setParentIdentity(string|int $parentIdentity): ItemInterface;
}
