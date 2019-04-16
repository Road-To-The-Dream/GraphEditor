<?php

namespace App\Services\Figure;

use App\Services\Figure;

/**
 * Class Point
 * @package App\Services\Figure
 */
class Point extends Figure
{
    /**
     * @param $imageInfo
     * @return mixed|resource
     */
    public function draw($imageInfo)
    {
        $borderColorInRGB = $this->explodeColorInRGB();

        $img = $this->createImage($imageInfo);

        $setBorderColor = imagecolorallocate($img, $borderColorInRGB[0], $borderColorInRGB[1], $borderColorInRGB[2]);
        imagesetpixel($img, $this->getX1(), $this->getY1(), $setBorderColor);

        return $img;
    }
}
