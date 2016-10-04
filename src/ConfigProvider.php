<?php

namespace At\PhpSettings;

use At\PhpSettings\Middleware\PhpSettingsMiddleware;
use Interop\Container\ContainerInterface;

class ConfigProvider
{
    public function __invoke()
    {
        return [
            'dependencies' => [
                'factories' => [
                    PhpSettingsMiddleware::class => function(ContainerInterface $c) {
                        return new PhpSettingsMiddleware();
                    },
                ],
            ],

            'middleware_pipeline' => [
                'always' => [
                    'middleware' => [
                        PhpSettingsMiddleware::class
                    ],
                    'priority' => 10000,
                ],
            ],

            'php_settings' => [
                // Global php settings
                'display_startup_errors' => false,
                'display_errors'         => false,
                'max_execution_time'     => 30,
                'date.timezone'          => 'UTC',
            ],

        ];
    }
}