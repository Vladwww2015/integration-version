<?php

namespace IntegrationHelper\IntegrationVersion\Exceptions;

class IntegrationVersionIsReady extends \Exception
{
    /**
     * Create an instance.
     *
     * @param string $source
     * @return void
     */
    public function __construct(string $source)
    {
        parent::__construct(sprintf('Integration Version for Source %s already done.', $source));
    }
}
