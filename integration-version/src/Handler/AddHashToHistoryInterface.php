<?php

namespace IntegrationHelper\IntegrationVersion\Handler;

use IntegrationHelper\IntegrationVersion\Model\HashInterface;

interface AddHashToHistoryInterface
{
    public function execute(HashInterface $hashModel): void;
}
