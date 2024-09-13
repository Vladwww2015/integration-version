<?php

namespace IntegrationVersion\Core\Handler;

use IntegrationVersion\Core\Context;
use IntegrationVersion\Core\Model\HashInterface;
use IntegrationVersion\Core\Model\Data\HashHistoryFactory;

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
