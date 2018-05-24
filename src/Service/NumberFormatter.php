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
        $hasComma = false;

        if ($number < 0) {
            $stringNumber = ltrim((string)$number, '-');
            $isNegative = true;
        } else {
            $stringNumber = (string)$number;
            $isNegative = false;
        }

        if (preg_match('/\./', $stringNumber)) {
            $hasComma = true;
            $afterComma = substr($stringNumber, strpos($stringNumber, '.'));
            while (strlen($afterComma) > 3) {
                if (substr($afterComma, strlen($afterComma) - 1, 1) > 4) {
                    $afterComma = '.'.(substr($afterComma, 1, strlen($afterComma) - 2) + 1);
                    if(preg_match("/^.1[0]+$/", $afterComma)) {
                        $stringNumber = $stringNumber + 1;
                        $hasComma = false;
                        break;
                    }
                } else {
                    $afterComma = substr($afterComma, 1, strlen($afterComma) - 1);
                }
            }
            if (strlen($afterComma) === 2) {
                $afterComma = $afterComma . '0';
            }
            $stringNumber = substr($stringNumber, 0, strpos($stringNumber, '.'));
            $beforeComma = $stringNumber;
            if (substr($afterComma, 1, 1) > 4 and strlen($stringNumber) > 3) {
                $stringNumber = $stringNumber + 1;
                $hasComma = false;
            }
        }

        if ($stringNumber >= 99950 and $stringNumber < 100000) {
            $stringNumber = "100K";
        } else if ($stringNumber >= 999500 and $stringNumber < 1000000) {
            $stringNumber = "1.00M";
        } else if ($stringNumber >= 1000 and $stringNumber < 99950) {
            $stringNumber = substr_replace($stringNumber, ' ', strlen($stringNumber) - 3, 0);
        } else if ($stringNumber >= 100000 and $stringNumber < 999500) {
            substr($stringNumber, 3, 1) > 4 ? $stringNumber = $stringNumber + 1000 : null;
            $stringNumber = substr($stringNumber, 0, 3) . 'K';
        } else if ($stringNumber >= 1000000) {
            substr($stringNumber, strlen($stringNumber) - 4, 1) > 4 ? $stringNumber = $stringNumber + 10000 : null;
            $stringNumber = substr($stringNumber, 0, strlen($stringNumber) - 4) . 'M';
            $stringNumber = substr_replace($stringNumber, '.', strlen($stringNumber) - 3, 0);
        }

        if ($hasComma and strlen($beforeComma) < 4) {
            $stringNumber = $stringNumber . substr($afterComma, 0, 3);
        }
        $isNegative ? $stringNumber = '-' . $stringNumber : null;

        return $stringNumber;
    }
}