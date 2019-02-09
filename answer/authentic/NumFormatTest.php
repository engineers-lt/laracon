<?php

use Laracon\authentic\q005\NumFormat;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: fortegp05
 */
class NumFormatTest extends TestCase
{
    private $numFormat;

    /**
     * 初期設定
     */
    public function setUp()
    {
        $this->numFormat = new NumFormat();
    }

    /**
     * フォーマットテスト 通常テスト
     */
    public function test_formatNormalNum()
    {
        $this->assertEquals("10,000,000", $this->numFormat->format("10000000"));
    }

    /**
     * フォーマットテスト 少数テスト
     */
    public function test_formatDecimal()
    {
        $this->assertEquals("0", $this->numFormat->format("0.05"));
    }

    /**
     * フォーマットテスト 引数が数字
     */
    public function test_formatParamNum()
    {
        // タイプヒントの挙動は設定次第
        $this->assertEquals("1,000", $this->numFormat->format(1000));
    }

    /**
     * フォーマットテスト 引数が文字列
     */
    public function test_formatParamText()
    {
        // 文字列は0として扱われる
        $this->assertEquals("0", $this->numFormat->format("test"));
    }

    /**
     * フォーマットテスト 引数が16進数文字列
     */
    public function test_formatParamTextNearHexadecimal()
    {
        // 16進ぽくても同じ
        $this->assertEquals("0", $this->numFormat->format("beef"));
    }

    /**
     * フォーマットテスト 引数が数字っぽい文字列
     */
    public function test_formatParamNumTextAfter()
    {
        // 後半の文字列が捨てられる
        $this->assertEquals("1,234", $this->numFormat->format("1234test"));
    }

    /**
     * フォーマットテスト 引数が数字っぽい文字列
     */
    public function test_formatParamNumTextMix()
    {
        // 後半の文字列が捨てられる
        $this->assertEquals("1", $this->numFormat->format("1-2-3-4"));
    }
}