<?php

namespace PHPModules\DBAL;

use Doctrine\DBAL\Connection;
use Psr\Container\ContainerInterface;

class DBALFactory
{
    public function __invoke(ContainerInterface $container): Connection
    {
        $DBConfig = $container->get('config')['DB'];
        $config = new \Doctrine\DBAL\Configuration();
        $connectionParams = [
            'dbname' => $DBConfig['dbname'],
            'user' => $DBConfig['user'],
            'password' => $DBConfig['password'],
            'host' => $DBConfig['host'],
            'driver' => $DBConfig['driver'],
            'port' => $DBConfig['port'],
            'charset' => $DBConfig['charset'],
        ];

        return \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
    }
}
