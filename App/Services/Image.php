<?php

namespace App\Services;

use App\Core\SessionManager;

/**
 * Class Image
 * @package App\Services
 */
class Image
{
    public const FOLDER_IMAGES_USER = '/UserImage/';

    private static $pictureHeight;
    private static $pictureWidth;

    /**
     * @return mixed
     */
    public static function getPictureWidth()
    {
        return self::$pictureWidth;
    }

    /**
     * @param mixed $pictureWidth
     */
    public static function setPictureWidth($pictureWidth): void
    {
        self::$pictureWidth = $pictureWidth;
    }

    /**
     * @return mixed
     */
    public static function getPictureHeight()
    {
        return self::$pictureHeight;
    }

    /**
     * @param mixed $pictureHeight
     */
    public static function setPictureHeight($pictureHeight): void
    {
        self::$pictureHeight = $pictureHeight;
    }

    /**
     * @param object $objectFigure
     * @return string
     */
    public function setElement(object $objectFigure): string
    {
        $objFigure = new $objectFigure();

        $objFile = new FileManager();

        $imageInfo = $objFile->cutFileName();
        $imageName = $objFile->updateFileName($imageInfo);

        $objFigure->setX1((int)$_POST[Figure::POST_COORDINATES]['x1'])
            ->setY1((int)$_POST[Figure::POST_COORDINATES]['y1']);
        $img = $objFigure->draw($imageInfo);

        ImagePreservation::addImage($imageName, $imageInfo[1]);

        return $this->saveImageAndSetInfoInSession($img, $imageName, $imageInfo[1]);
    }

    /**
     * @param $img
     * @param $imageName
     * @param $imageType
     * @return string
     */
    private function saveImageAndSetInfoInSession($img, $imageName, $imageType): string
    {
        if ($imageType === 'jpg') {
            $imageName .= '.jpg';
            imagejpeg($img, getcwd() . self::FOLDER_IMAGES_USER . $imageName);
        } else {
            $imageName .= '.png';
            imagepng($img, getcwd() . self::FOLDER_IMAGES_USER . $imageName);
        }

        SessionManager::setInfoInSession(['img' => self::FOLDER_IMAGES_USER . $imageName]);

        return $imageName;
    }
}
