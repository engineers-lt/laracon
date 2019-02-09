<?php

use Laracon\authentic\q004\ThrowException;
use PHPUnit\Framework\TestCase;

/**
 * Class ThrowExceptionTest
 */
class ThrowExceptionTest extends TestCase
{
    private $obj;

    public function setUp()
    {
        $this->obj = new ThrowException();
    }

    public function testExplodeThrowsException()
    {
        $this->expectException(\ArgumentCountError::class);
        $this->obj->callExplodeThrowsException("test");
    }

    public function testExplodeThrowsException_argumentStrIsTooShort()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(ThrowException::MESSAGE_ARGUMENT_IS_TOO_SHORT);
        $this->obj->callExplodeThrowsException("t");
    }

    public function testExplodeReturnTypeIsBad_argumentStrIsTooShort()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(ThrowException::MESSAGE_ARGUMENT_IS_TOO_SHORT);
        $this->obj->callExplodeReturnTypeIsBad("t");
    }

    public function testExplodeReturnTypeIsBad_SignatureIsBad()
    {
        $expected = ['a', 'b'];
        $this->expectException(\TypeError::class);
        $this->assertSame($expected, $this->obj->callExplodeReturnTypeIsBad("a,b"));
    }

    public function testExplodeNormally_argumentStrIsTooShort()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(ThrowException::MESSAGE_ARGUMENT_IS_TOO_SHORT);
        $this->obj->callExplodeNormally("t");
    }

    public function testExplodeNormally()
    {
        $expected = ['a', 'b', 'c'];
        $this->assertSame($expected, $this->obj->callExplodeNormally("a,b,c"));
    }
}
