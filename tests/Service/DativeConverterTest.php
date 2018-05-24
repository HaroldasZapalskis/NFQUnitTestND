<?php
///**
// * Created by PhpStorm.
// * User: haroldas
// * Date: 18.5.17
// * Time: 17.18
// */
//
//namespace App\Tests\Service;
//
//use App\Service\DativeConverter;
//use PHPUnit\Framework\TestCase;
//
//class DativeConverterTest extends TestCase
//{
//
//    /**
//     * @dataPorvider getConvertData
//     */
//    public function TestConvert($name, $expected) {
//        $converter = new DativeConverter();
//        $result = $converter->convert($name);
//        $this->assertEquals($expected, $result);
//    }
//
//    public function getConvertData() {
//        return [
//            ['Kastytis', 'Kastyčiui'],
//            ['Jurgis', 'Jurgiui'],
//            ['Paulius', 'Pauliui'],
//            ['Olge', 'Oleg']
//        ];
//    }
//}