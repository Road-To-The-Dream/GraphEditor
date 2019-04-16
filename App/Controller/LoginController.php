<?php

namespace App\Controller;

use App\Services\ActiveRecord\Client;
use App\Services\Authentication;

/**
 * Class LoginController
 * @package App\Controller
 */
class LoginController extends Controller
{
    public function index(): void
    {
        $this->checkSessionAndViewConnection();
        View::generate('login', $this->getConfiguration());
    }

    public function validate(): void
    {
        $clientId = $this->getClientId($_POST['login']);

        $objAuthentication = new Authentication();

        echo $objAuthentication->isAuthentication($clientId);
    }

    /**
     * @param $login
     * @return bool|null
     */
    private function getClientId($login)
    {
        $objClient = new Client();
        $objClient->setLogin($login);

        return $objClient->getClientId();
    }
}
