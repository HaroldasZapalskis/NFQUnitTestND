<?php
/**
 * Created by PhpStorm.
 * User: haroldas
 * Date: 18.5.23
 * Time: 23.48
 */

namespace App\Service;


class NumberFormatter
{
    public function format(float $number)
    {
        if($number > PHP_FLOAT_MAX) return "This number is too big for float to handle correctly";

        $hasComma = false;
        $isNegative = true;
        $stringNumber = number_format($number, 2, '.', '');

        $number < 0
            ? $stringNumber = ltrim((string)$number, '-')
            : $isNegative = false;

        if (preg_match('/\./', $stringNumber)) {
            $afterComma = substr($stringNumber, strpos($stringNumber, '.'));
            $hasComma = true;
            strlen($afterComma) === 2 ? $afterComma .= '0' : null;
            $stringNumber = substr($stringNumber, 0, strpos($stringNumber, '.'));
            (substr($afterComma, 1, 1) > 4 and strlen($stringNumber) > 3) ? ($stringNumber += 1 AND $hasComma = false) : null;
            ($afterComma === ".00" OR strlen($stringNumber) > 3) ? $hasComma = false : null;
        }

        if ($stringNumber >= 1000 and $stringNumber < 99950) {
            $stringNumber = substr_replace($stringNumber, ' ', strlen($stringNumber) - 3, 0);
        } else if ($stringNumber >= 99950 and $stringNumber < 999500) {
            $stringNumber = round(($stringNumber/1000),0).'K';
        } else if ($stringNumber >= 999500) {
            $stringNumber = round(($stringNumber/1000000),2).'M';
            $stringNumber === "1M" ? $stringNumber = "1.00M" : null;
        }

        $hasComma ? $stringNumber .= substr($afterComma, 0, 3) : null;
        $isNegative ? $stringNumber = '-' . $stringNumber : null;

        return $stringNumber;
    }
}