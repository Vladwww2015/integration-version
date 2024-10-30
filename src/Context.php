<?php

namespace IntegrationHelper\IntegrationVersion;

use IntegrationHelper\IntegrationVersion\HashGeneratorInterface;
use IntegrationHelper\IntegrationVersion\Repository\IntegrationVersionItemRepositoryInterface;
use IntegrationHelper\IntegrationVersion\DateTimeInterface;
use IntegrationHelper\IntegrationVersion\GetterParentItemCollectionInterface;
use IntegrationHelper\IntegrationVersion\IntegrationVersionItemManagerInterface;
use IntegrationHelper\IntegrationVersion\Repository\IntegrationVersionRepositoryInterface;
use IntegrationHelper\IntegrationVersion\IntegrationVersionManagerInterface;

class Context
{
    private static $instance = null;

    protected $integrationVersionItemRepository;

    protected $integrationVersionRepository;

    protected $integrationVersionManager;

    protected $integrationVersionItemManager;

    protected $dateTime;

    protected $hashGenerator;

    protected $getterParentItemCollection;

    private function __construct()
    {}

    public static function getInstance(): Context
    {
        if(static::$instance === null) {
            static::$instance = new self();
        }

        return static::$instance;
    }

    public function setDateTime(DateTimeInterface $dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    public function setGetterParentItemCollection(GetterParentItemCollectionInterface $getterParentItemCollection)
    {
        $this->getterParentItemCollection = $getterParentItemCollection;

        return $this;
    }

    public function setHashGenerator(HashGeneratorInterface $hashGenerator)
    {
        $this->hashGenerator = $hashGenerator;

        return $this;
    }


    public function setIntegrationVersionItemManager(IntegrationVersionItemManagerInterface $integrationVersionItemManager)
    {
        $this->integrationVersionItemManager = $integrationVersionItemManager;

        return $this;
    }

    public function setIntegrationVersionManager(IntegrationVersionManagerInterface $integrationVersionManager)
    {
        $this->integrationVersionManager = $integrationVersionManager;

        return $this;
    }

    public function setIntegrationVersionItemRepository(IntegrationVersionItemRepositoryInterface $integrationVersionItemRepository)
    {
        $this->integrationVersionItemRepository = $integrationVersionItemRepository;

        return $this;
    }

    public function setIntegrationVersionRepository(IntegrationVersionRepositoryInterface $integrationVersionRepository)
    {
        $this->integrationVersionRepository = $integrationVersionRepository;

        return $this;
    }

    public function getIntegrationVersionManager(): IntegrationVersionManagerInterface
    {
        return $this->integrationVersionManager;
    }

    public function getIntegrationVersionItemManager(): IntegrationVersionItemManagerInterface
    {
        return $this->integrationVersionItemManager;
    }

    public function getIntegrationVersionItemRepository(): IntegrationVersionItemRepositoryInterface
    {
        return $this->integrationVersionItemRepository;
    }

    public function getIntegrationVersionRepository(): IntegrationVersionRepositoryInterface
    {
        return $this->integrationVersionRepository;
    }



    public function getDateTime(): DateTimeInterface
    {
        return $this->dateTime;
    }


    public function getGetterParentItemCollection(): GetterParentItemCollectionInterface
    {
        return $this->getterParentItemCollection;
    }

    public function getHashGenerator(): HashGeneratorInterface
    {
        return $this->hashGenerator;
    }
}
