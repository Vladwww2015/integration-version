<?php

namespace IntegrationHelper\IntegrationVersion\Model;


class IntegrationVersion implements IntegrationVersionInterface
{
    private $id;
    private $identity_column = '';
    private $checksum_columns = [];
    private $hash = '';
    private $source = '';
    private $table_name = '';
    private $status = '';
    private $updated_at = '';
    private $hash_date_time = '';

    public function getIdValue(): int
    {
        return (int) $this->id;
    }

    public function setIdValue(int $id): IntegrationVersionInterface
    {
        $this->id = $id;

        return $this;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function setSource(string $source): IntegrationVersionInterface
    {
        $this->source = $source;

        return $this;
    }

    public function getTableName(): string
    {
        return $this->table_name;
    }

    public function setTableName(string $tableName): IntegrationVersionInterface
    {
        $this->table_name = $tableName;

        return $this;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function setHash(string $hash, string $dateTime): IntegrationVersionInterface
    {
        $this->hash = $hash;
        $this->setHashDateTime($dateTime);

        return $this;
    }

    public function getIdentityColumn(): string
    {
        return $this->identity_column;
    }

    public function setIdentityColumn(string $identityColumn): IntegrationVersionInterface
    {
        $this->identity_column = $identityColumn;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): IntegrationVersionInterface
    {
        $this->status = $status;

        return $this;
    }



    public function getUpdatedAtValue(): string
    {
        return $this->updated_at;
    }

    public function setUpdatedAtValue(string $updatedAt): IntegrationVersionInterface
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    public function getChecksumColumns(): array
    {
        return $this->checksum_columns;
    }

    public function setChecksumColumns(array $columns): IntegrationVersionInterface
    {
        $this->checksum_columns = $columns;

        return $this;
    }

    protected function setHashDateTime(string $hashDateTime): IntegrationVersionInterface
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

