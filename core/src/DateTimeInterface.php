<?php

namespace IntegrationVersion\Core;

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
