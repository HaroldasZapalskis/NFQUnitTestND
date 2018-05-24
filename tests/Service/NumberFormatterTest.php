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
//    /**
//     * @dataPorvider getData
//     * @param $number
//     * @param $expected
//     */
//    public function testFormat($number, $expected){
//        $formater = new NumberFormatter();
//        $result = $formater->format($number);
//        $this->assertEquals($expected, $result);
//    }
//
//    private function getData() {
//        return [
//            [100, '100'],
//            [99950, '100k'],
//        ];
//    }

    public function testFormat(){
        $formater = new NumberFormatter();
        $result = $formater->format(100);
        $this->assertEquals('100', $result);
        $result = $formater->format(99950);
        $this->assertEquals('100K', $result);
        $result = $formater->format(-28834999.99);
        $this->assertEquals('-28.84M', $result);
        $result = $formater->format(-28834999.49);
        $this->assertEquals('-28.83M', $result);
        $result = $formater->format(100);
        $this->assertEquals('100', $result);
        $result = $formater->format(10);
        $this->assertEquals('10', $result);
        $result = $formater->format(1000.54);
        $this->assertEquals('1 001', $result);
        $result = $formater->format(1000.49);
        $this->assertEquals('1 000', $result);
        $result = $formater->format(66.6666);
        $this->assertEquals('66.67', $result);
        $result = $formater->format(66.999);
        $this->assertEquals('66.99', $result);
        $result = $formater->format(999.999);
        $this->assertEquals('999.99', $result);
        $result = $formater->format(999.499);
        $this->assertEquals('999.50', $result);
        $result = $formater->format(12.00);
        $this->assertEquals('12', $result);
        $result = $formater->format(2835779);
        $this->assertEquals('2.84M', $result);
        $result = $formater->format(999500);
        $this->assertEquals('1.00M', $result);
        $result = $formater->format(535216);
        $this->assertEquals('535K', $result);
        $result = $formater->format(27533.78);
        $this->assertEquals('27 534', $result);
        $result = $formater->format(27533.49);
        $this->assertEquals('27 533', $result);
        $result = $formater->format(533.1);
        $this->assertEquals('533.10', $result);
        $result = $formater->format(12.00);
        $this->assertEquals('12', $result);
    }
}