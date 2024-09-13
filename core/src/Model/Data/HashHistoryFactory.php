<?php

namespace IntegrationVersion\Core\Model\Data;

use IntegrationVersion\Core\Model\HashHistoryInterface;
use IntegrationVersion\Core\Storage\HashHistoryStorageInterface;

class HashHistoryFactory implements HashHistoryInterface
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
     * @return HashHistoryInterface
     */
    public function setId(string|integer $id): HashHistoryInterface
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $source
     * @return HashHistoryInterface
     */
    public function setSource(string $source): HashHistoryInterface
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @param string $hash
     * @return HashHistoryInterface
     */
    public function setHash(string $hash): HashHistoryInterface
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * @param string $hash
     * @return HashHistoryInterface
     */
    public function setDatetime(string $hash): HashHistoryInterface
    {
        $this->hash = $hash;

        return $this;
    }
}
