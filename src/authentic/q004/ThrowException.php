<?php

// メソッド呼び出し時に例外が出るように定義
declare(strict_types=1);

namespace Laracon\authentic\q004;

/**
 * テスト内容の説明
 *   例外が発生する実装になっているソースコードに対して、
 *   どうテストを書くか?という問題です。
 *   引数不足時の例外、戻り値の型不正などの場合にどうテストを書くか?
 *   実際にIDEなどを使っているとこういったことはないかもしれませんが、
 *   意図的に例外を返す実装を想定してテストを書いてみてください。
 *
 * テストのヒント
 *   expectException(\TypeError::class);
 */

/**
 * Class ThrowException
 * @package LaravelJpCon\q006
 */
class ThrowException
{

    const MESSAGE_ARGUMENT_IS_TOO_SHORT = 'can not explode because $str is too short';

    /**
     * 入力された文字列を文字列で分割しようとはしているが...？
     * @param string $str
     * @return array
     * @throws \Exception
     */
    public function callExplodeThrowsException(string $str): array
    {
        if (strlen($str) <= 1) {
            // 一文字しかないので引数が不正として例外にする
            throw new \Exception(self::MESSAGE_ARGUMENT_IS_TOO_SHORT);
        }
        // explode ( string $delimiter , string $string [, int $limit = PHP_INT_MAX ] ) : array

        // これでは明らかに引数が足らない
        // 実際には ArgumentCountError が発生する
        return explode($str);
    }

    /**
     * @param string $str
     * @return string
     * @throws \Exception
     * なお、正しくは戻り値の型がarrayですが、テスト用にstringにしています。
     */
    public function callExplodeReturnTypeIsBad(string $str): string
    {
        if (strlen($str) <= 1) {
            // 一文字しかないので引数が不正として例外にする
            throw new \Exception(self::MESSAGE_ARGUMENT_IS_TOO_SHORT);
        }

        return explode($str, ",");
    }

    /**
     * @param string $str
     * @return array
     * @throws \Exception
     */
    public function callExplodeNormally(string $str): array
    {
        if (strlen($str) <= 1) {
            // 一文字しかないので引数が不正として例外にする
            throw new \Exception(self::MESSAGE_ARGUMENT_IS_TOO_SHORT);
        }

        return explode(",", $str);
    }
}
