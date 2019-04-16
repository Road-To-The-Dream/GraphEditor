<?php

namespace App\Services\Figure;

use App\Services\Figure;

/**
 * Class Text
 * @package App\Services\Figure
 */
class Text extends Figure
{
    private $text;

    /**
     * @return null
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param null $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    /**
     * Text constructor.
     */
    public function __construct()
    {
        $this->setText($_POST[self::POST_COORDINATES]['text']);
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
        $font = getcwd() . '/fonts/font.ttf';
        imagettftext($img, 32, 0, $this->getX1(), $this->getY1(), $setBorderColor, $font, $this->getText());

        return $img;
    }
}
