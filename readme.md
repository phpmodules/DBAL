DBAL layer for zend expressive.

## Install

```
composer require phpmodules/dbal
```

## Usage

in `config/autoload/zend-expressive.global.php`
or `config/autoload/development.local.php`:

```php
return [
    // Toggle the configuration cache. Set this to boolean false, or remove the
    // directive, to disable configuration caching. Toggling development mode
    // will also disable it by default; clear the configuration cache using
    // `composer clear-config-cache`.
    ConfigAggregator::ENABLE_CACHE => true,

    // Enable debugging; typically used to provide debugging information within templates.
    'debug' => false,

    'zend-expressive' => [
        // Provide templates for the error handling middleware to use when
        // generating responses.
        'error_handler' => [
            'template_404'   => 'error::404',
            'template_error' => 'error::error',
        ],
    ],

    'DB' => [
        'dbname' => 'echoes',
        'user' => 'twn39',
        'password' => 'tangweinan',
        'host' => 'localhost',
        'driver' => 'pdo_pgsql',
        'port' => 5432,
        'charset' => 'utf8',
    ]
];
```

in `config/config.php` add:

```php
$aggregator = new ConfigAggregator([
    
    ...
    
    
    // Default App module config
    \App\ConfigProvider::class,
    \PHPModules\DBAL\ConfigProvider::class,

    ...
    
], $cacheConfig['config_cache_path']);

return $aggregator->getMergedConfig();
```