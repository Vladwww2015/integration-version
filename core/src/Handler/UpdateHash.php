<?php

namespace IntegrationVersion\Core\Handler;

use IntegrationVersion\Core\Context;
use IntegrationVersion\Core\Handler\UpdateHashInterface;
use IntegrationVersion\Core\Model\HashInterface;
use IntegrationVersion\Core\Model\SourceInterface;
use IntegrationVersion\Core\Storage\HashStorageInterface;

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
