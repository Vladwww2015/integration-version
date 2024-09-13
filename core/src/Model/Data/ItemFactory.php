<?php

namespace IntegrationVersion\Core\Model\Data;

use IntegrationVersion\Core\Model\ItemInterface;

/**
 *
 */
class ItemFactory implements ItemInterface
{
    /**
     * @param $id
     * @param $source
     * @param $identity
     * @param $value
     * @param $versionHash
     * @param $parentIdentity
     */
    public function __construct(
       protected $id = '',
       protected $source = '',
       protected $identity = '',
       protected $value = '',
       protected $versionHash = '',
       protected $parentIdentity = '',
    ) {}

    /**
     * @param $id
     * @param $source
     * @param $identity
     * @param $value
     * @param $versionHash
     * @param $parentIdentity
     * @return void
     */
    public static function create(
        $id = null,
        $source = '',
        $identity = '',
        $value = '',
        $versionHash = '',
        $parentIdentity = '',
    ){
        return new self(
            $id,
            $source,
            $identity,
            $value,
            $versionHash,
            $parentIdentity
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
     * @return string|int
     */
    public function getIdentity(): string|integer
    {
        return $this->identity;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getVersionHash(): string
    {
        return $this->versionHash;
    }

    /**
     * @return string|int
     */
    public function getParentIdentity(): string|integer
    {
        return $this->parentIdentity;
    }

    /**
     * @param $id
     * @return ItemInterface
     */
    public function setId($id): ItemInterface
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $source
     * @return ItemInterface
     */
    public function setSource(string $source): ItemInterface
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @param string $identity
     * @return ItemInterface
     */
    public function setIdentity(string $identity): ItemInterface
    {
        $this->identity = $identity;

        return $this;
    }

    /**
     * @param string $value
     * @return ItemInterface
     */
    public function setValue(string $value): ItemInterface
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param string $versionHash
     * @return ItemInterface
     */
    public function setVersionHash(string $versionHash): ItemInterface
    {
        $this->versionHash = $versionHash;

        return $this;
    }

    /**
     * @param string $parentIdentity
     * @return ItemInterface
     */
    public function setParentIdentity(string $parentIdentity): ItemInterface
    {
        $this->parentIdentity = $parentIdentity;

        return $this;
    }
}
