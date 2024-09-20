<?php

namespace IntegrationHelper\IntegrationVersion\Generator;

use IntegrationHelper\IntegrationVersion\Model\SourceInterface;

interface HashGeneratorInterface
{
    /**
     * @param SourceInterface $source
     * @return string
     */
    public function generate(SourceInterface $source): string;
}
