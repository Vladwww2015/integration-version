<?php

namespace IntegrationHelper\IntegrationMaster\Config;

use IntegrationHelper\IntegrationMaster\Handlers\IntegrationMasterExceptionHandlerInterface;
use IntegrationHelper\IntegrationMaster\Handlers\IntegrationMasterHandlerInterface;
use IntegrationHelper\IntegrationMaster\Model\IntegrationMasterExceptionInterface;
use IntegrationHelper\IntegrationMaster\Model\IntegrationMasterInterface;

class Config
{
    public function __construct(
        protected string $integrationMasterModel,
        protected string $integrationMasterExceptionModel,
        protected IntegrationMasterHandlerInterface $integrationMasterHandler,
        protected IntegrationMasterExceptionHandlerInterface $integrationMasterExceptionHandler,
    ) {
        if(!in_array(IntegrationMasterInterface::class, class_implements($integrationMasterModel))) {
            throw new \Exception(
                sprintf(
                    'Class: %s must to implement interface: %s',
                    $integrationMasterModel,
                    IntegrationMasterInterface::class
                )
            );
        }

        if(!in_array(IntegrationMasterExceptionInterface::class, class_implements($integrationMasterExceptionModel))) {
            throw new \Exception(
                sprintf(
                    'Class: %s must to implement interface: %s',
                    $integrationMasterExceptionModel,
                    IntegrationMasterExceptionInterface::class
                )
            );
        }
    }

    public function getIntegrationMasterHandler(): IntegrationMasterHandlerInterface
    {
        return $this->integrationMasterHandler;
    }

    public function getIntegrationMasterExceptionHandler(): IntegrationMasterExceptionHandlerInterface
    {
        return $this->integrationMasterExceptionHandler;
    }

    /**
     * @return string
     */
    public function getIntegrationMasterModel(): string
    {
        return $this->integrationMasterModel;
    }

    /**
     * @return string
     */
    public function getIntegrationMasterExceptionModel(): string
    {
        return $this->integrationMasterExceptionModel;
    }
}
