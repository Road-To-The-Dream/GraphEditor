<?php

namespace App\Services;

/**
 * Class Redirect
 * @package App\Services
 */
class Redirect
{
    /**
     * @param $url
     */
    public static function redirectTo($url): void
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] .'/' . $url);
        exit();
    }
}
