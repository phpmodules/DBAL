<?php

namespace PHPModules\DBAL;

use Doctrine\DBAL\Connection;

class ConfigProvider
{
    public function __invoke() : array
    {
        return [
            'dependencies' => $this->getDependencies(),
        ];
    }

    public function getDependencies() : array
    {
        return [
            'invokables' => [
            ],
            'factories'  => [
                Connection::class => DBALFactory::class,
            ],
            'aliases' => [
                'DB' => Connection::class,
            ],
        ];
    }
}
