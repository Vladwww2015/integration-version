<?php

namespace IntegrationVersion\Core\Handler;

use IntegrationVersion\Core\Model\HashInterface;

interface AddHashToHistoryInterface
{
    public function execute(HashInterface $hashModel): void;
}
