<?php

use Laracon\basic\WS4;
use PHPUnit\Framework\TestCase;

class WS4Test extends TestCase
{
    public function testGetDays()
    {
        $month = new WS4();
        $this->assertEquals(31, $month->getDays(1));
        $this->assertEquals(28, $month->getDays(2));
        $this->assertEquals(30, $month->getDays(4));
    }

    public function testGetDays_throwsInvalidArgumentException()
    {
        $month = new Laracon\basic\WS4();
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("引数は1-12で入力してください。");
        // 1-12 以外の月を渡す
        $month->getDays(13);
    }
}
