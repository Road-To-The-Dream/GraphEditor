<?php

namespace App\Services\Figure;

/**
 * Class FigureFactory
 * @package App\Services\Figure
 */
class FigureFactory
{
    public static function createFigure($figure)
    {
        switch ($figure) {
            case 'Circle':
                return new Circle();
            case 'Line':
                return new Line();
            case 'Ellipse':
                return new Ellipse();
            case 'Parallelogram':
                return new Parallelogram();
            case 'Point':
                return new Point();
            case 'Rectangle':
                return new Rectangle();
            case 'Square':
                return new Square();
            case 'Text':
                return new Text();
            case 'Triangle':
                return new Triangle();
        }
    }
}
