<?php

namespace IntegrationVersion\Core\Model\Data;

use IntegrationVersion\Core\Model\SourceInterface;

class SourceFactory implements SourceInterface
{
    /**
     * @param $id
     * @param $source
     * @param $table
     * @param $identityColumn
     */
    public function __construct(
        protected $id = '',
        protected $source = '',
        protected $table = '',
        protected $identityColumn = ''
    ) {}

    /**
     * @param $id
     * @param $source
     * @param $table
     * @param $identityColumn
     * @return self
     */
    public static function create(
        $id = '',
        $source = '',
        $table = '',
        $identityColumn = '',
    ){
        return new self(
            $id,
            $source,
            $table,
            $identityColumn
        );
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function getIdentityColumn(): string
    {
        return $this->identityColumn;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @param string|integer $id
     * @return SourceInterface
     */
    public function setId(string|integer $id): SourceInterface
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $source
     * @return SourceInterface
     */
    public function setSource(string $source): SourceInterface
    {
        $this->source = $source;

        return $this;
    }

    public function setTable(string $table): SourceInterface
    {
        $this->table = $table;

        return $this;
    }

    public function setIdentityColumn(string $identityColumn): SourceInterface
    {
        $this->identityColumn = $identityColumn;

        return $this;
    }
}
