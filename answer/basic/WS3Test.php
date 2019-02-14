<?php

use Laracon\basic\WS3;
use PHPUnit\Framework\TestCase;

class WS3Test extends TestCase
{
    public function testFizzBuzz()
    {
        $ws3 = new WS3();
        $this->assertEquals("Fizz", $ws3->fizzBuzz(3));
        $this->assertEquals("Buzz", $ws3->fizzBuzz(5));
        $this->assertEquals("FizzBuzz", $ws3->fizzBuzz(15));

    }
}
