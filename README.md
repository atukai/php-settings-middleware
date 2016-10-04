# Php Settings Middleware
Managing php settings.

## Installation

`composer require atukai/php-settings-middleware`

## Usage

**Zend Expressive**:

Include config from ConfigProvider.php. Recommend to use [Expressive Configuration Manager]
(https://github.com/mtymek/expressive-config-manager)

```php
$configManager = new ConfigManager([
    ...,
    \At\PhpSettings\ConfigProvider::class,
]);
``` 
 
## Configuration

To configure the php settings as you required, add the following to your config file:

```PHP
'php_settings' => [
    'display_startup_errors'     => false,
    'display_errors'             => true,
    'max_execution_time'         => 30,
    'date.timezone'              => 'UTC',
]