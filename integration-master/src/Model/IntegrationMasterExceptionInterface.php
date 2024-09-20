<?php
namespace IntegrationHelper\IntegrationMaster\Model;

interface IntegrationMasterExceptionInterface
{
    public function getId(): int;

    public function getMasterId(): int;

    public function getEntityIdentity(): string|int;
}
