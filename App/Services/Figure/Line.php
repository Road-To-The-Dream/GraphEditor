<?php

namespace App\Services\Figure;

use App\Services\Figure;

/**
 * Class Line
 * @package App\Services\Figure
 */
class Line extends Figure
{
    private $x2;
    private $y2;

    /**
     * @return mixed
     */
    public function getX2()
    {
        return $this->x2;
    }

    /**
     * @param mixed $x2
     */
    public function setX2($x2): void
    {
        $this->x2 = $x2;
    }

    /**
     * @return mixed
     */
    public function getY2()
    {
        return $this->y2;
    }

    /**
     * @param mixed $y2
     */
    public function setY2($y2): void
    {
        $this->y2 = $y2;
    }

    /**
     * Line constructor.
     */
    public function __construct()
    {
        $this->setX2((int)$_POST[self::POST_COORDINATES]['x2']);
        $this->setY2((int)$_POST[self::POST_COORDINATES]['y2']);
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
        imageline($img, $this->getX1(), $this->getY1(), $this->getX2(), $this->getY2(), $setBorderColor);

        return $img;
    }
}
