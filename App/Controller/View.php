<?php

namespace App\Controller;

use App\Services\Redirect;

/**
 * Class View
 * @package App\Controller
 */
class View
{
    public static function generate($contentView, $configuration, $data = null)
    {
        ob_start();

        if (file_exists(__DIR__ . '/../View/' . $contentView . '.php')) {
            require_once __DIR__ . '/../View/' . $contentView . '.php';
            return true;
        }

        Redirect::redirectTo('error');
        return false;
    }
}
