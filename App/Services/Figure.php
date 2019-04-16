<?php

namespace App\Services;

/**
 * Class Figure
 * @package App\Services
 */
abstract class Figure
{
    public const POST_COORDINATES = 'coordinates';

    protected $x1;
    protected $y1;

    /**
     * @return mixed
     */
    public function getX1()
    {
        return $this->x1;
    }

    /**
     * @param $x1
     * @return $this
     */
    public function setX1($x1): self
    {
        $this->x1 = $x1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getY1()
    {
        return $this->y1;
    }

    /**
     * @param $y1
     * @return $this
     */
    public function setY1($y1): self
    {
        $this->y1 = $y1;

        return $this;
    }

    /**
     * @param $imageInfo
     * @return mixed
     */
    abstract public function draw($imageInfo);

    /**
     * @return mixed
     */
    protected function explodeColorInRGB()
    {
        $hex = $_POST['colorBorder'];
        $arrayColor = sscanf($hex, '#%02x%02x%02x');

        return $arrayColor;
    }

    /**
     * @param $imageInfo
     * @return resource
     */
    protected function createImage($imageInfo)
    {
        if ($imageInfo[1] === 'jpg') {
            $img = imagecreatefromjpeg(getcwd() . Image::FOLDER_IMAGES_USER . $imageInfo[0] . '.jpg');
        } else {
            $img = imagecreatefrompng(getcwd() . Image::FOLDER_IMAGES_USER . $imageInfo[0] . '.png');
        }

        return $img;
    }
}
