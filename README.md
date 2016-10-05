# Php Settings Middleware
Managing php settings.

## Installation

`composer require atukai/php-settings-middleware`

## Configuration

To configure the php settings as you required, add the following to your config file
under `php_setting` key:

```php
'php_settings' => [
    'display_startup_errors'     => false,
    'display_errors'             => true,
    'max_execution_time'         => 30,
    'date.timezone'              => 'UTC',
    
    'routes' => [
        'home' => [
            'memory_limit'       => '32M',
            'max_execution_time' => '60',
        ],
    ],
]
``` 

Add factory to container config
```
	'dependencies' => [
		'factories' => [
			...
			At\PhpSettingsMiddleware::class => At\PhpSettingsMiddlewareFactory::class,
			...
		],
	],
```

Add the middleware to the pipeline	
```
	'middleware' => [
		...
		At\PhpSettingsMiddleware::class,
		...
	],	
```

## PHP Ini Configurations

For more details of PHP ini configurations see

1. http://php.net/manual/en/ini.list.php 
2. http://php.net/manual/en/configuration.changes.modes.php 