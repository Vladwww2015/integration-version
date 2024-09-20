<?php

namespace IntegrationHelper\IntegrationVersion\Model\Data;

use IntegrationHelper\IntegrationVersion\Model\SourceDependencyInterface;

class SourceDependencyFactory implements SourceDependencyInterface
{

    /**
     * @param $id
     * @param $source
     * @param $parentSource
     * @param $parentTable
     * @param $parentIdentityColumn
     */
    public function __construct(
        protected $id = '',
        protected $source = '',
        protected $parentSource = '',
        protected $parentTable = '',
        protected $parentIdentityColumn = '',
    ) {}

    /**
     * @param $id
     * @param $source
     * @param $parentSource
     * @param $parentTable
     * @param $parentIdentityColumn
     * @return self
     */
    public static function create(
        $id = '',
        $source = '',
        $parentSource = '',
        $parentTable = '',
        $parentIdentityColumn = '',
    ){
        return new self(
            $id,
            $source,
            $parentSource,
            $parentTable,
            $parentIdentityColumn
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
    public function getParentSource(): string
    {
        return $this->parentSource;
    }

    /**
     * @return string
     */
    public function getParentTable(): string
    {
        return $this->parentTable;
    }

    /**
     * @return string
     */
    public function getParentIdentityColumn(): string
    {
        return $this->parentIdentityColumn;
    }

    /**
     * @param string|int $id
     * @return SourceDependencyInterface
     */
    public function setId(string|int $id): SourceDependencyInterface
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $source
     * @return SourceDependencyInterface
     */
    public function setSource(string $source): SourceDependencyInterface
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @param string $parentSource
     * @return SourceDependencyInterface
     */
    public function setParentSource(string $parentSource): SourceDependencyInterface
    {
        $this->parentSource = $parentSource;

        return $this;
    }

    /**
     * @param string $parentTable
     * @return SourceDependencyInterface
     */
    public function setParentTable(string $parentTable): SourceDependencyInterface
    {
        $this->parentTable = $parentTable;

        return $this;
    }

    /**
     * @param string $parentIdentityColumn
     * @return SourceDependencyInterface
     */
    public function setParentIdentityColumn(string $parentIdentityColumn): SourceDependencyInterface
    {
        $this->parentIdentityColumn = $parentIdentityColumn;

        return $this;
    }

}
