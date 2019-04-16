<?php

namespace App\Services;

use App\Core\SessionManager;
use App\Services\ActiveRecord\Client;

/**
 * Class Authentication
 * @package App\Services
 */
class Authentication
{
    private const DATETIME_FORMAT = 'Y-m-d H:i:s';

    private $errorMessage;

    /**
     * @param $clientId
     * @return string
     */
    public function isAuthentication($clientId): string
    {
        $this->errorMessage = LoginValidator::validate(trim($_POST['login']));

        if (empty($this->errorMessage)) {
            $login = StringService::cleanField($_POST['login']);

            SessionManager::setInfoInSession(
                [
                    'ua' => $_SERVER['HTTP_USER_AGENT'],
                    'ip' => $_SERVER['REMOTE_ADDR'],
                    'login' => $login
                ]
            );

            if (empty($clientId)) {
                $this->addClient($login);
            }
        }

        return $this->errorMessage;
    }

    /**
     * @param $login
     */
    private function addClient($login): void
    {
        $objClient = new Client();
        $objClient->setLogin($login)
            ->setCreateAt('\'' . date(self::DATETIME_FORMAT) . '\'');

        $objClient->insert();
    }
}
