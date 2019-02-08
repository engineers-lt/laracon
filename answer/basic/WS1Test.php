<?php

class WS1Test extends PHPUnit\Framework\TestCase
{
    public function testHelloWorld()
    {
        $ws1 = new Laracon\basic\WS1();
        $this->assertEquals("HelloWorld", $ws1->helloWorld());
    }
}
