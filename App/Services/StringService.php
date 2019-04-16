<?php

namespace App\Services;

/**
 * Class StringService
 * @package App\Services
 */
class StringService
{
    /**
     * @param string $fieldValue
     * @return string
     */
    public static function cleanField($fieldValue = ''): string
    {
        $fieldValue = trim($fieldValue);
        $fieldValue = stripslashes($fieldValue);
        $fieldValue = strip_tags($fieldValue);

        return htmlspecialchars($fieldValue);
    }
}
