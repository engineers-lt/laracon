<?php

class WS3Test extends PHPUnit\Framework\TestCase
{
    public function testFizzBuzz()
    {
        $ws3 = new Laracon\basic\WS3();
        $this->assertEquals("Fizz", $ws3->fizzBuzz(3));
        $this->assertEquals("Buzz", $ws3->fizzBuzz(5));
        $this->assertEquals("FizzBuzz", $ws3->fizzBuzz(15));

    }
}
