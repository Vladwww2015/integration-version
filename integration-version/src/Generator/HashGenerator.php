<?php

namespace IntegrationHelper\IntegrationVersion\Generator;

use IntegrationHelper\IntegrationVersion\Context;
use IntegrationHelper\IntegrationVersion\Model\SourceInterface;

class HashGenerator implements HashGeneratorInterface
{
    public function __construct(protected Context $context)
    {}

    /**
     * @param SourceInterface $source
     * @return string
     */
    public function generate(SourceInterface $source): string
    {
        return hash('sha256', $source . $this->context->getDateTime()->getTimestamp());
    }
}
