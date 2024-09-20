<?php

namespace IntegrationHelper\IntegrationVersion\Handler;

use IntegrationHelper\IntegrationVersion\Context;
use IntegrationHelper\IntegrationVersion\Model\HashInterface;
use IntegrationHelper\IntegrationVersion\Model\Data\HashHistoryFactory;

class AddHashToHistory implements AddHashToHistoryInterface
{
    public function __construct(protected Context $context)
    {}

    public function execute(HashInterface $hashModel): void
    {
        if(!$hashModel->getId()) return;

        $hashHistory = new HashHistoryFactory();
        $hashHistory->setHash($hashModel->getHash());
        $hashHistory->setSource($hashModel->getSource());
        $hashHistory->setDatetime($hashModel->getDatetime());
        $this->context->getHashHistoryStorage()->create($hashModel);
    }
}
