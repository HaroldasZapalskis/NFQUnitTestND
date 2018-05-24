<?php
/**
 * Created by PhpStorm.
 * User: haroldas
 * Date: 18.5.24
 * Time: 03.14
 */

namespace App\Tests\Service;

use App\Service\MoneyFormatter;
use PHPUnit\Framework\TestCase;
use App\Service\NumberFormatter;

class MoneyFormatterTest extends TestCase
{
    public function testFormatEur() {
        $numberFormatterMock = $this->createMock(NumberFormatter::class);
        $numberFormatterMock->expects($this->once())
            ->method('format')
            ->with(2835779)
            ->willReturn('2.84M');

        $moneyFormatter = new MoneyFormatter($numberFormatterMock);
        $this->assertEquals('2.84M €', $moneyFormatter->formatEur(2835779));
    }
    public function testFormatUsd() {
        $numberFormatterMock = $this->createMock(NumberFormatter::class);
        $numberFormatterMock->expects($this->once())
            ->method('format')
            ->with(211.99)
            ->willReturn('211.99');

        $moneyFormatter = new MoneyFormatter($numberFormatterMock);
        $this->assertEquals('$211.99', $moneyFormatter->formatUsd(211.99));
    }
}