<?php

namespace At\PhpSettings;

use At\PhpSettings\Middleware\PhpSettingsMiddleware;
use Interop\Container\ContainerInterface;

class PhpSettingsMiddlewareFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $settings = $container->has('php_settings') ? $container->get('php_settings') : [];
        return new PhpSettingsMiddleware($settings);
    }
}