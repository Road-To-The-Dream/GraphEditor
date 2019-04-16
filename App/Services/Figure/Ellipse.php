<?php

namespace App\Services\Figure;

use App\Services\Figure;

/**
 * Class Ellipse
 * @package App\Services\Figure
 */
class Ellipse extends Figure
{
    private $diameterHeight;
    private $diameterWidth;

    /**
     * @return mixed
     */
    public function getDiameterHeight()
    {
        return $this->diameterHeight;
    }

    /**
     * @param mixed $diameterHeight
     */
    public function setDiameterHeight($diameterHeight): void
    {
        $this->diameterHeight = $diameterHeight;
    }

    /**
     * @return mixed
     */
    public function getDiameterWidth()
    {
        return $this->diameterWidth;
    }

    /**
     * @param mixed $diameterWidth
     */
    public function setDiameterWidth($diameterWidth): void
    {
        $this->diameterWidth = $diameterWidth;
    }

    public function __construct()
    {
        $this->setDiameterHeight((int)$_POST[self::POST_COORDINATES]['diameterHeight']);
        $this->setDiameterWidth((int)$_POST[self::POST_COORDINATES]['diameterWidth']);
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
        imageellipse($img, $this->getX1(), $this->getY1(), $this->getDiameterWidth(), $this->getDiameterHeight(), $setBorderColor);

        return $img;
    }
}
