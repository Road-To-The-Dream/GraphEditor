<?php

namespace App\Services;

use App\Core\SessionManager;

/**
 * Class FileManager
 * @package App\Services
 */
class FileManager
{
    private const DATETIME_FORMAT = 'H:i:s';
    private $fileName;

    /**
     * @return array|mixed
     */
    public function cutFileName()
    {
        $this->fileName = explode('/', $_POST['srcImg']);

        $imageInfo = $this->fileName[count($this->fileName) - 1];

        return explode('.', $imageInfo);
    }

    /**
     * @param $imageInfo
     * @return string
     */
    public function updateFileName($imageInfo): string
    {
        $data = date(self::DATETIME_FORMAT);
        $nameImage = strtok($imageInfo[0], '-');

        return $nameImage . '-' . $data;
    }

    /**
     * @param $imageInfo
     * @return bool
     */
    public function deleteFile($imageInfo): bool
    {
        return unlink(getcwd() . Image::FOLDER_IMAGES_USER . $imageInfo[0] . '.' . $imageInfo[1]);
    }

    /**
     * @param $imageName
     * @return string|string[]|null
     */
    public static function removeSpacesInFileName($imageName)
    {
        return preg_replace('/\s+/', '', $imageName);
    }

    /**
     * @return string
     */
    public static function moveFileAndSetImageInfoInSession(): string
    {
        try {
            $imageName = self::removeSpacesInFileName($_FILES['file']['name']);

            $targetPath = getcwd() . Image::FOLDER_IMAGES_USER . $imageName;
            move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

            $response = Image::FOLDER_IMAGES_USER . $imageName;

            $size = getimagesize($targetPath);
            Image::setPictureHeight($size[1]);

            SessionManager::setInfoInSession(
                [
                    'img' => Image::FOLDER_IMAGES_USER . $imageName,
                    'height' => Image::getPictureHeight()
                ]
            );

        } catch (\Exception $ex) {
            $response = 'Произошла ошибка! ' . $ex->getMessage();
        }

        return $response;
    }
}
