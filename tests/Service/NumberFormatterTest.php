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
            [-28834999.99, '-28.84M'],
            [-28834999.49, '-28.83M'],
            [10, '10'],
            [1000.54, '1 001'],
            [1000.49, '1 000'],
            [66.6666, '66.67'],
            [66.999, '67'],
            [999.496, '999.50'],
            [12.00, '12'],
            [2835779, '2.84M'],
            [999500, '1.00M'],
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
        ];
    }
}