<?php

namespace IntegrationVersion\Core\Generator;

use IntegrationVersion\Core\Model\SourceInterface;

interface HashGeneratorInterface
{
    /**
     * @param SourceInterface $source
     * @return string
     */
    public function generate(SourceInterface $source): string;
}
