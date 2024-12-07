<?php

namespace IntegrationHelper\IntegrationVersion\Model;

class IntegrationVersionItem implements IntegrationVersionItemInterface
{
    private $id;
    private $parent_id;
    private $identity_value = '';
    private $version_hash = '';
    private $checksum = '';
    private $updated_at = '';
    private $hash_date_time = '';
    private $status = '';

    public function getIdValue(): int
    {
        return (int) $this->id;
    }

    public function setIdValue(int $id): IntegrationVersionItemInterface
    {
        $this->id = $id;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): IntegrationVersionItemInterface
    {
        $this->status = $status;

        return $this;
    }


    public function getVersionHash(): string
    {
        return $this->version_hash;
    }

    public function setVersionHash(string $versionHash, string $hashDateTime): IntegrationVersionItemInterface
    {
        $this->version_hash = $versionHash;
        $this->setHashDateTime($hashDateTime);

        return $this;
    }

    public function getIdentityValue(): string
    {
        return $this->identity_value;
    }

    public function setIdentityValue(string $identityValue): IntegrationVersionItemInterface
    {
        $this->identity_value = $identityValue;

        return $this;
    }

    public function getChecksum(): string
    {
        return $this->checksum;
    }

    public function setChecksum(string $checksum): IntegrationVersionItemInterface
    {
        $this->checksum = $checksum;

        return $this;
    }

    public function getUpdatedAtValue(): string
    {
        return $this->updated_at;
    }

    public function setUpdatedAtValue(string $updatedAt): IntegrationVersionItemInterface
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    public function getParentId(): int
    {
        return $this->parent_id;
    }

    public function setParentId(int $parentId): IntegrationVersionItemInterface
    {
        $this->parent_id = $parentId;

        return $this;
    }

    protected function setHashDateTime(string $hashDateTime): IntegrationVersionItemInterface
    {
        $this->hash_date_time = $hashDateTime;

        return $this;
    }

    /**
     * @return string
     */
    public function getHashDateTime(): string
    {
        return $this->hash_date_time;
    }
}
