<?php

namespace IntegrationHelper\IntegrationVersion;

class IntegrationVersionResultOutput
{
    protected bool $result = false;

    public function setResult(bool $result = true)
    {
        $this->result = $result;
    }

    public function getResult(): bool
    {
        return $this->result;
    }
}
