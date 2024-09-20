<?php

namespace IntegrationHelper\IntegrationVersion\Model;

interface HashInterface
{
    public function getId();

    public function getSource(): string;

    public function getHash(): string;

    public function getDatetime(): string;

    public function setId(string|int $id): HashInterface;

    public function setSource(string $source): HashInterface;

    public function setHash(string $hash): HashInterface;

    public function setDatetime(string $hash): HashInterface;
}
