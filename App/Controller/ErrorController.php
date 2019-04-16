<?php

namespace App\Controller;

/**
 * Class ErrorController
 * @package App\Controller
 */
class ErrorController extends Controller
{
    public function index(): void
    {
        $configuration = require __DIR__ . '/../conf/Configuration.php';

        View::generate('error', $configuration['baseHost']);
    }
}
