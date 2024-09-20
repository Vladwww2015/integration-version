<?php

namespace IntegrationHelper\IntegrationVersion\Model;

interface HashHistoryInterface
{
    public function getId();

    public function getSource(): string;

    public function getHash(): string|int;

    public function getDatetime(): string;

    public function setId(string|int $id): HashHistoryInterface;

    public function setSource(string $source): HashHistoryInterface;

    public function setHash(string $hash): HashHistoryInterface;

    public function setDatetime(string $hash): HashHistoryInterface;
}
