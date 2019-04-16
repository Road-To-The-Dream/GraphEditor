<?php

namespace App\Controller;

/**
 * Class Controller
 * @package App\Controller
 */
class Controller
{
    private $configuration;

    /**
     * @return mixed
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @param mixed $configuration
     */
    public function setConfiguration($configuration): void
    {
        $this->configuration = $configuration;
    }

    protected function checkSessionAndViewConnection(): void
    {
        $this->configuration = require __DIR__ . '/../conf/Configuration.php';

        ob_start();
        require_once __DIR__ . '/../View/template/layout.php';

        if (isset($_SESSION['login']) && $_SESSION['ua'] === $_SERVER['HTTP_USER_AGENT'] && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
            require_once __DIR__ . '/../View/template/header.php';
        } else {
            require_once __DIR__ . '/../View/template/headerLogin.php';
        }
    }
}
