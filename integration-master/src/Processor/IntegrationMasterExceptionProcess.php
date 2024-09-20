<?php

namespace IntegrationHelper\IntegrationMaster\Processor;

use IntegrationHelper\IntegrationMaster\Config\Config;
use IntegrationHelper\IntegrationMaster\Model\CollectionInterface;
use IntegrationHelper\IntegrationMaster\Model\IntegrationMasterExceptionInterface;

class IntegrationMasterExceptionProcess
{
    protected static $instance = null;

    protected function __construct(
        protected Config $config
    ){}

    /**
     * @return IntegrationMasterProcess
     */
    public static function getInstance(Config $config): IntegrationMasterProcess
    {
        if(static::$instance === null) {
            static::$instance = new self($config);
        }

        return static::$instance;
    }


    public function createOrIgnore(
        int $masterId,
        array $identities
    ): void
    {
        $entities = $this->find($masterId, $identities);
        $identities = array_reverse($identities);
        foreach ($entities as $key => $entity) {
            if(array_key_exists($entity->getEntityIdentity(), $identities)) unset($identities[$entity->getEntityIdentity()]);
        }

        if($identities) $this->updateOrCreate($masterId, array_keys($identities));
    }

    /**
     * @param int $masterId
     * @param array $identities
     * @return void
     */
    public function updateOrCreate(
        int $masterId,
        array $identities
    ): void
    {
        $this->config->getIntegrationMasterExceptionHandler()->save($masterId, $identities);
    }

    /**
     * @param int $id
     * @return IntegrationMasterExceptionInterface
     */
    public function get(int $id): IntegrationMasterExceptionInterface
    {
        return $this->config->getIntegrationMasterExceptionHandler()->read($id);
    }

    /**
     * @param int $masterId
     * @param array $entityIdentities
     * @return IntegrationMasterExceptionInterface[]
     */
    public function find(int $masterId, array $entityIdentities = []): array
    {
        return $this->config->getIntegrationMasterExceptionHandler()->find($masterId, $entityIdentities);
    }

    /**
     * @param int $masterId
     * @param array $entityIdentities
     * @return void
     */
    public function delete(int $masterId, array $entityIdentities): void
    {
        $this->config->getIntegrationMasterExceptionHandler()->delete($masterId, $entityIdentities);
    }
}
