<?php

require_once __DIR__ . '/../App/conf/logs.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Application;

Application::init($_SERVER['REQUEST_URI']);
