<?php

ini_set('display_errors', false);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/logs/logs.log');
error_reporting(E_ALL & ~E_NOTICE);
