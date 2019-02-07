<?php

class WS2Test extends PHPUnit\Framework\TestCase
{
    public function testCalPriIncTax()
    {
        $tax = new Laracon\basic\WS2();

        $this->assertEquals(105, $tax->calPriIncTax(100, 0.05));
        $this->assertEquals(108, $tax->calPriIncTax(100, 0.08));
        $this->assertEquals(110, $tax->calPriIncTax(100, 0.10));
    }
}
