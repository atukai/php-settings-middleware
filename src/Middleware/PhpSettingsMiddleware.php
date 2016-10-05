<?php

namespace At\PhpSettings\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Expressive\Router\RouteResult;

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
     * PhpSettingsMiddleware constructor.
     * @param array $settings
     */
    public function __construct(array $settings = [])
    {
        $this->settings = $settings;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param callable $next
     * @return mixed
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        // Check for route-specific php settings
        if (isset($this->settings['routes']) && is_array($this->settings['routes']) && !empty($this->settings['routes'])) {
            $routeSettings = $this->settings['routes'];

            $routeResult = $request->getAttribute(RouteResult::class);
            $routeName   = $routeResult->getMatchedRouteName();

            if (isset($routeSettings[$routeName]) && is_array($routeSettings[$routeName])) {
                $this->settings = array_merge($this->settings, $routeSettings[$routeName]);
            }
        }

        foreach ($this->settings as $key => $value) {
            if (!is_array($value)) {
                ini_set($key, $value);
            }
        }

        return $next($request, $response);
    }
}