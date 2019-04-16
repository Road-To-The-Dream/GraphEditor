<?php

namespace App\Core;

use App\Core\Router\Router;

/**
 * Class Application
 * @package App\Core
 */
class Application
{
    public static function init($uri): void
    {
        SessionManager::startSession();

        $routingInfo = Router::callAction($uri);

        $controllerName = $routingInfo['controllerName'];
        $actionName = $routingInfo['actionName'];

        $controllerName->$actionName();
    }
}
