<?php

namespace At\PhpSettings\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class PhpSettings
 * @package At\PhpSettings\Middleware
 */
class PhpSettingsMiddleware
{
    /**
     * @var array
     */
    protected $settings = [];

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param callable $next
     * @return mixed
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        foreach ($this->settings as $key => $value) {
            ini_set($key, $value);
        }

        return $next($request, $response);
    }
}