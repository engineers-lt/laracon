<?php

namespace Laracon\authentic\q005;

/**
 * テスト内容の説明
 *  number_formatに対するパターンテストです。
 *  数値を桁区切りしてくれるメソッドですが、
 *  そのメソッドに対してどういったテストパターンを考えられるか?という問題になります。
 *
 * テストのヒント
 * 　文字列
 * 　一見数字に見える文字
 */

/**
 * Created by PhpStorm.
 * User: tetsunosuke
 */
class NumFormat
{
    /**
     * @param string $str
     * @return string
     */
    public function format(string $str): string
    {
        // number_format ( float $number [, int $decimals = 0 ] ) : string
        // この変換はやや想定外の挙動をするので、テストしておきたい
        $f = floatval($str);
        return number_format($f);
    }
}