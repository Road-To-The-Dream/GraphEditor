<?php

namespace App\Services;

/**
 * Class CoordinatesValidator
 * @package App\Services
 */
class CoordinatesValidator
{
    private $errorMessage = '';

    /**
     * @return string
     */
    public function validate(): string
    {
        if (!$this->isImageLoad() && !$this->isEmpty($_POST['coordinates'])) {
            $this->isValuesNegative($_POST['coordinates']);
        }

        return $this->errorMessage;
    }

    /**
     * @param $arrCoordinates
     * @return bool
     */
    private function isEmpty($arrCoordinates): bool
    {
        foreach ($arrCoordinates as $item) {
            if ($item === '') {
                $this->errorMessage = 'В координатах присутствуют пустые значения!';
                return true;
            }
        }

        return false;
    }

    /**
     * @param $arrCoordinates
     * @return bool
     */
    private function isValuesNegative($arrCoordinates): bool
    {
        foreach ($arrCoordinates as $item) {
            if ($item < 0) {
                $this->errorMessage = 'В координатах присутствуют отрицательные значения!';
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    private function isImageLoad(): bool
    {
        if (!isset($_SESSION['img'])) {
            $this->errorMessage = 'Для нанесения фигуры требуется выбрать изображение!';
            return true;
        }

        return false;
    }
}
