<?php

namespace Laracon\basic;

class WS2
{
    // 消費税計算後の値 を返す
    public function calPriIncTax(int $price, float $taxRate): float
    {
        $afterPrice = $price + $price * $taxRate;

        return $afterPrice;
    }
}
