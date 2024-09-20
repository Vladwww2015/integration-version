<?php
namespace IntegrationHelper\IntegrationMaster\Model;

class IntegrationMaster implements IntegrationMasterInterface
{
    public function __construct(
        protected int $id,
        protected string $modelCollection,
        protected bool $isMaster,
        protected string $entityType,
        protected string $externalSourceIdentity
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getEntityType(): string
    {
        return $this->entityType;
    }

    public function getExternalSourceIdentity(): string
    {
        return $this->externalSourceIdentity;
    }

    public function isMaster(): bool
    {
        return $this->isMaster;
    }

    public function getModelCollection(): string
    {
        return $this->modelCollection;
    }
}
