<?php

use Laracon\basic\WS2;

class TaxTest extends PHPUnit\Framework\TestCase
{
    public function testCalPriIncTax()
    {
        $tax = new Laracon\WS2();

        $this->assertEquals(105, $tax->CalPriIncTax(100, 0.05));
        $this->assertEquals(108, $tax->CalPriIncTax(100, 0.08));
        $this->assertEquals(110, $tax->CalPriIncTax(100, 0.10));
    }
}
