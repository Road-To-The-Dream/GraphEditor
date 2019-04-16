<?php

namespace App\Core;

/**
 * Class SessionManager
 * @package App\Core
 */
class SessionManager
{
    public static function startSession(): void
    {
        session_start();
    }

    /**
     * @param $sessionInfo
     */
    public static function setInfoInSession($sessionInfo): void
    {
        foreach ($sessionInfo as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }
}
