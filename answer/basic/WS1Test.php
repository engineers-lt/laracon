<?php

use PHPUnit\Framework\TestCase;

class WS1Test extends TestCase
{
    public function testHelloWorld()
    {
        $ws1 = new Laracon\basic\WS1();
        $this->assertEquals("HelloWorld", $ws1->helloWorld());
    }
}
