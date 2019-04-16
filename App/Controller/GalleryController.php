<?php

namespace App\Controller;

use App\Services\ActiveRecord\Client;
use App\Services\ActiveRecord\Image;

/**
 * Class GalleryController
 * @package App\Controller
 */
class GalleryController extends Controller
{
    public function index(): void
    {
        $this->checkSessionAndViewConnection();

        $clientId = $this->getClientId();

        $imagesData = $this->getImagesInfo($clientId[0]['id'] ?? 1);

        $dataDB = [
            'image' => $imagesData
        ];

        View::generate('gallery', $this->getConfiguration(), $dataDB);
    }

    private function getImagesInfo($clientId)
    {
        $objImage = new Image();
        $objImage->setClientId($clientId);

        return $objImage->getAll();
    }

    private function getClientId()
    {
        $objClient = new Client();
        $objClient->setLogin($_SESSION['login']);

        return $objClient->getClientId();
    }
}
