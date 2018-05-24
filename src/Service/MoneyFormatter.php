<?php
/**
 * Created by PhpStorm.
 * User: haroldas
 * Date: 18.5.24
 * Time: 03.14
 */

namespace App\Service;

class MoneyFormatter
{
    /**
     * @var NumberFormatter
     */
    private $numberFormatter;
    /**
     * @param \App\Service\NumberFormatter $numberFormatter
     */
    public function __construct(NumberFormatter $numberFormatter)
    {
        $this->numberFormatter = $numberFormatter;
    }

    public function formatEur($number) {
        return $this->numberFormatter->format($number)." \xE2\x82\xAc";
    }

    public function formatUsd($number) {
        return "$".$this->numberFormatter->format($number);
    }
}