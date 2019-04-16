<?php

namespace App\Services;

/**
 * Class ImageValidator
 * @package App\Services
 */
class ImageValidator
{
    private $pictureFormat;

    /**
     * @param mixed $pictureFormat
     */
    public function setPictureFormat($pictureFormat): void
    {
        $this->pictureFormat = $pictureFormat;
    }

    /**
     * @return bool
     */
    public function validateType(): bool
    {
        return $this->pictureFormat === 'image/png' || $this->pictureFormat === 'image/jpeg';
    }
}
