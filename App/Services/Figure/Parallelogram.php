<?php

namespace App\Services\Figure;

use App\Services\Figure;

/**
 * Class Parallelogram
 * @package App\Services\Figure
 */
class Parallelogram extends Figure
{
    private $x2;
    private $y2;
    private $x3;
    private $y3;
    private $x4;
    private $y4;

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
     * @return mixed
     */
    public function getX3()
    {
        return $this->x3;
    }

    /**
     * @param mixed $x3
     */
    public function setX3($x3): void
    {
        $this->x3 = $x3;
    }

    /**
     * @return mixed
     */
    public function getY3()
    {
        return $this->y3;
    }

    /**
     * @param mixed $y3
     */
    public function setY3($y3): void
    {
        $this->y3 = $y3;
    }

    /**
     * @return mixed
     */
    public function getX4()
    {
        return $this->x4;
    }

    /**
     * @param mixed $x4
     */
    public function setX4($x4): void
    {
        $this->x4 = $x4;
    }

    /**
     * @return mixed
     */
    public function getY4()
    {
        return $this->y4;
    }

    /**
     * @param mixed $y4
     */
    public function setY4($y4): void
    {
        $this->y4 = $y4;
    }

    /**
     * Parallelogram constructor.
     */
    public function __construct()
    {
        $this->setX2((int)$_POST[self::POST_COORDINATES]['x2']);
        $this->setY2((int)$_POST[self::POST_COORDINATES]['y2']);
        $this->setX3((int)$_POST[self::POST_COORDINATES]['x3']);
        $this->setY3((int)$_POST[self::POST_COORDINATES]['y3']);
        $this->setX4((int)$_POST[self::POST_COORDINATES]['x4']);
        $this->setY4((int)$_POST[self::POST_COORDINATES]['y4']);
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
        imageline($img, $this->getX3(), $this->getY3(), $this->getX4(), $this->getY4(), $setBorderColor);
        imageline($img, $this->getX1(), $this->getY1(), $this->getX3(), $this->getY3(), $setBorderColor);
        imageline($img, $this->getX2(), $this->getY2(), $this->getX4(), $this->getY4(), $setBorderColor);

        return $img;
    }
}
