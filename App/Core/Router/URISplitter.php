<?php

namespace App\Core\Router;

/**
 * Class URISplitter
 * @package App\Core\Router
 */
class URISplitter
{
    public static function split($uri): array
    {
        $controllerName = 'Login';
        $actionName = 'index';

        $routes = explode('/', $uri);

        if (!empty($routes[1])) {   // get name views
            $controllerName = ucfirst(strtolower($routes[1]));
        }

        if (!empty($routes[2])) {  // get name action
            $actionName = strtolower($routes[2]);
        }

        $controllerName = 'App\Controller\\' . $controllerName . 'Controller';

        return [
            'controllerName' => $controllerName,
            'actionName' => $actionName
        ];
    }
}
