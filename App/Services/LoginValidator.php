<?php

namespace App\Services;

/**
 * Class LoginValidator
 * @package App\Services
 */
class LoginValidator
{
    private static $errorMessage = '';

    /**
     * @param $login
     * @return string
     */
    public static function validate($login): string
    {
        if (empty($login)) {
            self::$errorMessage = 'Поле пустое. Введите логин для входа!';
        } else {
            if (self::isLoginValid($login)) {
                self::$errorMessage = '';
            } else {
                self::$errorMessage = 'Логин пользователя должен содержать только буквы латинского алфавита!';
            }
        }

        return self::$errorMessage;
    }

    /**
     * @param $login
     * @return bool
     */
    private static function isLoginValid($login): bool
    {
        return preg_match('/[a-zA-Z]/', StringService::cleanField($login));
    }
}
