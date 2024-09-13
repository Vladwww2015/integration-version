<?php

namespace IntegrationVersion\Core\Model\Data;

use IntegrationVersion\Core\Model\HashInterface;

class HashFactory implements HashInterface
{
    /**
     * @param $id
     * @param $source
     * @param $hash
     * @param $datetime
     */
    public function __construct(
        protected $id = '',
        protected $source = '',
        protected $hash = '',
        protected $datetime = '',
    ) {}

    /**
     * @param $id
     * @param $source
     * @param $hash
     * @param $datetime
     * @return self
     */
    public static function create(
        $id = '',
        $source = '',
        $hash = '',
        $datetime = '',
    ){
        return new self(
            $id,
            $hash,
            $source,
            $datetime
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
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @return string
     */
    public function getDatetime(): string
    {
        return $this->datetime;
    }

    /**
     * @param string|integer $id
     * @return HashInterface
     */
    public function setId(string|integer $id): HashInterface
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $source
     * @return HashInterface
     */
    public function setSource(string $source): HashInterface
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @param string $hash
     * @return HashInterface
     */
    public function setHash(string $hash): HashInterface
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * @param string $hash
     * @return HashInterface
     */
    public function setDatetime(string $hash): HashInterface
    {
        $this->hash = $hash;

        return $this;
    }
}
