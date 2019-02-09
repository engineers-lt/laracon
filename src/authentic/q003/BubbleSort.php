<?php

namespace Laracon\authentic\q003;

/**
 * テスト内容の説明
 *   バブルソートのテスト。
 *   3問目は配列が入出力になる場合のメソッドに対してテストを書きます。
 *   このメソッドは所謂バブルソートを実装したメソッドになります。
 *   与えられた引数の配列を昇順でソートするしますので、
 *   引数に配列を与え、戻り値に引数を取ります。
 *   この戻り値の引数をどうテストするか?という問題になります。
 *
 * テストのヒント
 * 　assertArraySubset(array $subset, array $array[, bool $strict = '', string $message = ''])
 */

/**
 * Created by PhpStorm.
 * User: fortegp05
 */
class BubbleSort
{

    /**
     * @param array $array
     * @return array
     */
    public function sort(array $array): array
    {
        $size = count($array);
        for ($i = 0; $i < $size; $i++) {
            for ($j = ($size - 1); $i < $j; $j--) {
                if ($array[$j] < $array[$j - 1]) {
                    $temp = $array[$j - 1];
                    $array[$j - 1] = $array[$j];
                    $array[$j] = $temp;
                }
            }
        }

        return $array;
    }
}