<?php

use Laracon\authentic\q003\BubbleSort;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: fortegp05
 */
class BubbleSortTest extends TestCase
{
    private $bubbleSort;

    /**
     * 初期設定
     */
    public function setUp()
    {
        $this->bubbleSort = new BubbleSort();
    }

    /**
     * 正常にソートされる
     */
    public function test_normalSort()
    {
        $expectArray = [1, 2, 3, 4, 5];
        $array = [2, 4, 5, 3, 1];
        $this->assertArraySubset($expectArray, $this->bubbleSort->sort($array));
    }

    /**
     * 1個だけの配列
     */
    public function test_oneData()
    {
        $expectArray = [1];
        $array = [1];
        $this->assertArraySubset($expectArray, $this->bubbleSort->sort($array));
    }

    /**
     * 空の配列
     */
    public function test_blankArray()
    {
        $array = [];
        $this->assertArraySubset($array, $this->bubbleSort->sort($array));
    }
}