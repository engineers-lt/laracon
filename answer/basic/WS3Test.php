<?php

class WS3Test extends PHPUnit\Framework\TestCase
{
    public function testFizzBuzz()
    {
        $ws3 = new Laracon\WS3();
        $this->assertEquals("Fizz", $ws3->FizzBuzz(3));
        $this->assertEquals("Buzz", $ws3->FizzBuzz(5));
        $this->assertEquals("FizzBuzz", $ws3->FizzBuzz(15));

    }
}
