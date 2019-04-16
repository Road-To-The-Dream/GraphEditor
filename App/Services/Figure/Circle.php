<?php

namespace App\Services\Figure;

use App\Services\Figure;

/**
 * Class Circle
 * @package App\Services\Figure
 */
class Circle extends Figure
{
    private $diameter;

    /**
     * @return mixed
     */
    public function getDiameter()
    {
        return $this->diameter;
    }

    /**
     * @param mixed $diameter
     */
    public function setDiameter($diameter): void
    {
        $this->diameter = $diameter;
    }

    public function __construct()
    {
        $this->setDiameter((int)$_POST[self::POST_COORDINATES]['diameter']);
    }

    /**
     * @param $imageInfo
     * @return mixed|resource
     */
    public function draw($imageInfo)
    {
        $borderColorInRGB = $this->explodeColorInRGB();

        $img = $this->createImage($imageInfo);

        $setBorderColor = imagecolorallocate($img, $borderColorInRGB[0], $borderColorInRGB[1], $borderColorInRGB[2]);
        imageellipse($img, $this->getX1(), $this->getY1(), $this->getDiameter(), $this->getDiameter(), $setBorderColor);

        return $img;
    }
}
