<?php

namespace IntegrationVersion\Core\Model;

interface HashHistoryInterface
{
    public function getId();

    public function getSource(): string;

    public function getHash(): string|integer;

    public function getDatetime(): string;

    public function setId(string|integer $id): HashHistoryInterface;

    public function setSource(string $source): HashHistoryInterface;

    public function setHash(string $hash): HashHistoryInterface;

    public function setDatetime(string $hash): HashHistoryInterface;
}
