<?php

namespace IntegrationHelper\IntegrationVersion;

interface HashGeneratorInterface
{
    public function generate(string $source): string;

    public function decode(string $hash): array;
}
