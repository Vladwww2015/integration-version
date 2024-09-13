<?php

namespace IntegrationVersion\Core\Model;

interface ItemInterface
{
    public function getId();

    public function getSource(): string;

    public function getIdentity(): string|integer;

    public function getValue(): string;

    public function getVersionHash(): string;

    public function getParentIdentity(): string|integer;

    public function setId($id): ItemInterface;

    public function setSource(string $source): ItemInterface;

    public function setIdentity(string|integer $identity): ItemInterface;

    public function setValue(string $value): ItemInterface;

    public function setVersionHash(string $versionHash): ItemInterface;

    public function setParentIdentity(string|integer $parentIdentity): ItemInterface;
}
