<?php

use Laracon\basic\WS1;
use PHPUnit\Framework\TestCase;

class WS1Test extends TestCase
{
    public function testHelloWorld()
    {
        $ws1 = new WS1();
        $this->assertEquals("HelloWorld", $ws1->helloWorld());
    }
}
