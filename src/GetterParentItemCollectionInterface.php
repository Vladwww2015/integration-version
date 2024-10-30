<?php

namespace IntegrationHelper\IntegrationVersion;

interface GetterParentItemCollectionInterface
{
    public function getItems(string $table, string $identityColumn, array $columns, int $page = 1, int $limit = 10000): iterable;

    public function getItem(string $table, string $identityColumn, mixed $identityValue, array $columns): iterable;
}
