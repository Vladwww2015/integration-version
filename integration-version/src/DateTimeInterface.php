<?php

namespace IntegrationHelper\IntegrationVersion;

interface DateTimeInterface extends \DateTimeInterface
{
    /**
     * @return DateTimeInterface
     */
    public function getModel(): DateTimeInterface;

    /**
     * @return string
     */
    public function getFormat(): string;

    public function getDatetime(): string;
}
