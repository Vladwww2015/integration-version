<?php

namespace IntegrationHelper\IntegrationVersion;

use IntegrationHelper\IntegrationVersion\Repository\IntegrationVersionItemRepositoryInterface;
use IntegrationHelper\IntegrationVersion\Repository\IntegrationVersionRepositoryInterface;

class Context
{
    private static $instance = null;

    protected $integrationVersionItemRepository;

    protected $integrationVersionRepository;

    protected $integrationVersionManager;

    protected $integrationVersionItemManager;

    protected $dateTime;

    protected $hashGenerator;

    protected array $getterParentItemCollections = [];

    protected $defaultGetterParentItemCollection;

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

    public function setGetterParentItemCollection(string $sourceCode, GetterParentItemCollectionInterface $getterParentItemCollection)
    {
        if($sourceCode === 'default_getter_parent_item_collection') $this->defaultGetterParentItemCollection = $getterParentItemCollection;

        $this->getterParentItemCollections[$sourceCode] = $getterParentItemCollection;

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

    public function getGetterParentItemCollection(string $sourceCode): GetterParentItemCollectionInterface
    {
        return $this->getterParentItemCollections[$sourceCode] ?? $this->defaultGetterParentItemCollection;
    }

    public function getHashGenerator(): HashGeneratorInterface
    {
        return $this->hashGenerator;
    }
}
