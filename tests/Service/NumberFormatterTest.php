<?php
/**
 * Created by PhpStorm.
 * User: haroldas
 * Date: 18.5.24
 * Time: 02.14
 */

namespace App\Tests\Service;

use App\Service\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{
    /**
     * @dataProvider getData
     * @param $number
     * @param $expected
     */
    public function testFormat($number, $expected){
        $formater = new NumberFormatter();
        $result = $formater->format($number);
        $this->assertEquals($expected, $result);
    }

    public function getData() {
        return [
            [100, '100'],
            [99950, '100K'],
            [99949, '99 949'],
            [99949.495, '100K'],
            [-28834999.99, '-28.84M'],
            [-28834999.49, '-28.83M'],
            [-2888834999.5, '-2888.84M'],
            [-28834445, '-28.83M'],
            [-28834445.484449, '-28.83M'],
            [10, '10'],
            [10.5, '10.50'],
            [-1, '-1'],
            [1000.54, '1 001'],
            [1000.49, '1 000'],
            [66.6666, '66.67'],
            [66.999, '67'],
            [999.496, '999.50'],
            [12.00, '12'],
            [2835779, '2.84M'],
            [999500, '1.00M'],
            [999499.5, '1.00M'],
            [1000000, '1.00M'],
            [999499, '999K'],
            [999498.99999, '999K'],
            [999499.99999, '1.00M'],
            [535216, '535K'],
            [27533.78, '27 534'],
            [27533.49, '27 533'],
            [535216, '535K'],
            [533.1, '533.10'],
            [535216, '535K'],
            [999.99, '999.99'],
            [999.9, '999.90'],
            [999.999, '1 000'],
            [999.9999, '1 000'],
            [999.9951, '1 000'],
            [999.1231313543215, '999.12'],
            [999.9999, '1 000'],
            [999.495, '999.50'],
            [485111111111555555555555555555555555555555555555555555555555555555555555548511111114851111111115555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555551119115555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555551119555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555551119.4949, 'This number is too big for float to handle correctly'],
        ];
    }
}