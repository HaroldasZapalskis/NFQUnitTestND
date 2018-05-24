<?php
/**
 * Created by PhpStorm.
 * User: haroldas
 * Date: 18.5.17
 * Time: 17.20
 */

namespace App\Service;


class DativeConverter
{
    public function convert($name) {
        if (mb_substr($name, -3) === 'tis') {
            return mb_substr($name, 0, -3) . 'čiui';
        }
        if (mb_substr($name, -2) === 'is') {
            return mb_substr($name, 0, -2) . 'iui';
        }
        if (mb_substr($name, -2) === 'us') {
            return mb_substr($name, 0, -2) . 'ui';
        }

        return $name;
    }
}