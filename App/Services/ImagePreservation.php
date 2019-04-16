<?php

namespace App\Services;

use App\Services\ActiveRecord\Client;
use App\Services\ActiveRecord\Image as ImageActiveRecord;

/**
 * Class ImagePreservation
 * @package App\Services
 */
class ImagePreservation
{
    private const DATETIME_FORMAT='Y-m-d H:i:s';

    public static function addImage($imageName, $imageType): void
    {
        $objClient = new Client();
        $objClient->setLogin($_SESSION['login']);
        $clientId = $objClient->getClientId();

        $objImage = new ImageActiveRecord();

        $objImage->setImageName($imageName)
            ->setPath(Image::FOLDER_IMAGES_USER . $imageName . '.' . $imageType)
            ->setClientId($clientId[0]['id'] ?? 1)
            ->setCreateAt('\'' . date(self::DATETIME_FORMAT) . '\'');

        $objImage->insert();
    }
}
