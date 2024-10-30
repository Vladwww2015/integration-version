<?php

namespace IntegrationHelper\IntegrationVersion;

use IntegrationHelper\IntegrationVersion\Context;
use IntegrationHelper\IntegrationVersion\HashGeneratorInterface;

class HashGenerator implements HashGeneratorInterface
{

    public function generate(string $source): string
    {
        $dateTime = Context::getInstance()->getDateTime();

        $data = [
            'datetime' => $dateTime->getNow(),
            'source' => $source
        ];

        return base64_encode(json_encode($data));
    }

    public function decode(string $hash): array
    {
        return json_decode(base64_decode($hash),  true);
    }
}
