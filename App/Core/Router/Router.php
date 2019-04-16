<?php

namespace App\Core\Router;

use App\Services\Redirect;

/**
 * Class Router
 * @package App\Core\Router
 */
class Router
{
    public static function callAction($uri)
    {
        $routingInfo = URISplitter::split($uri);

        $controllerName = $routingInfo['controllerName'];
        $actionName = $routingInfo['actionName'];

        if (class_exists($controllerName)) {
            $controller = new $controllerName;
            if (method_exists($controller, $actionName)) {
                return [
                    'controllerName' => $controller,
                    'actionName' => $actionName
                ];
            }
        }

        Redirect::redirectTo('error');
    }
}
