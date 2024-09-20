<?php

namespace IntegrationHelper\IntegrationVersion\Handler;

use IntegrationHelper\IntegrationVersion\Context;
use IntegrationHelper\IntegrationVersion\Handler\UpdateHashInterface;
use IntegrationHelper\IntegrationVersion\Model\HashInterface;
use IntegrationHelper\IntegrationVersion\Model\SourceInterface;
use IntegrationHelper\IntegrationVersion\Storage\HashStorageInterface;

class UpdateHash implements UpdateHashInterface
{
    public function __construct(protected Context $context){}

    public function execute(HashInterface $hashModel, SourceInterface $source, string $newHash): void
    {
        if($hashModel->getId()) {
            $hashModel->setHash($newHash);
            $this->context->getHashStorage()->update($hashModel);
            return;
        }

        $hashModel->setHash($newHash);
        $hashModel->setSource($source->getName());
        $hashModel->setDatetime($this->context->getDateTime()->getDatetime());
        $this->storage->create($hashModel);
    }
}
