<?php

namespace IntegrationVersion\Core\Model;

interface HashInterface
{
    public function getId();

    public function getSource(): string;

    public function getHash(): string;

    public function getDatetime(): string;

    public function setId(string|integer $id): HashInterface;

    public function setSource(string $source): HashInterface;

    public function setHash(string $hash): HashInterface;

    public function setDatetime(string $hash): HashInterface;
}
