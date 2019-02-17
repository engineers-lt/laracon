<?php
/**
 * Created by PhpStorm.
 * User: fortegp05
 */

use Laracon\authentic\q001\Wareki;
use PHPUnit\Framework\TestCase;

/**
 * Class WarekiTest
 */
class WarekiTest extends TestCase
{
    private $wareki;
    const RESULT_MSG = 'RESULT';
    const INPUT = 'INPUT';
    private $testData = [
        '日付じゃない(文字列)' => [self::RESULT_MSG => Wareki::ERROR_MSG, self::INPUT => 'HOGEHOGE'],
        '日付じゃない(数値)' => [self::RESULT_MSG => Wareki::ERROR_MSG, self::INPUT => '00000000'],
        'あり得ない日付' => [self::RESULT_MSG => Wareki::ERROR_MSG, self::INPUT => '20180229'],
        '江戸終了境界' => [self::RESULT_MSG => Wareki::ERROR_MSG, self::INPUT => '18680124'],
        '明治開始境界' => [self::RESULT_MSG => Wareki::MEIJI, self::INPUT => '18680125'],
        '明治終了境界' => [self::RESULT_MSG => Wareki::MEIJI, self::INPUT => '19120729'],
        '大正開始境界' => [self::RESULT_MSG => Wareki::TAISYO, self::INPUT => '19120730'],
        '大正終了境界' => [self::RESULT_MSG => Wareki::TAISYO, self::INPUT => '19261224'],
        '昭和開始境界' => [self::RESULT_MSG => Wareki::SYOWA, self::INPUT => '19261225'],
        '昭和終了境界' => [self::RESULT_MSG => Wareki::SYOWA, self::INPUT => '19890107'],
        '平成開始境界' => [self::RESULT_MSG => Wareki::HEISEI, self::INPUT => '19890108'],
        '平成終了境界' => [self::RESULT_MSG => Wareki::HEISEI, self::INPUT => '20190430'],
        '新年号開始境界' => [self::RESULT_MSG => Wareki::NEW_GENGO, self::INPUT => '20190501'],
    ];

    /**
     * 初期設定
     */
    public function setUp()
    {
        $this->wareki = new Wareki();
    }

    /**
     * dataProvider未使用版。
     *
     */
    public function test_getWareki_no_dataProvider()
    {
        foreach ($this->testData as $title => $data) {
            $this->assertSame($data[self::RESULT_MSG], $this->wareki->getWareki($data[self::INPUT]), $title);
        }
    }

    /**
     * dataProvider使用版。
     * 入力しているデータはkey=>array()となっているが、引数で入力されるのはarray()のみ
     * keyは失敗時にテスト名として表示される
     * @dataProvider dataProvider
     * @param $expected
     * @param $input
     */
    public function test_getWareki_dataProvider($expected, $input)
    {
        $this->assertSame($expected, $this->wareki->getWareki($input));
    }

    /**
     * @return array
     */
    public function dataProvider()
    {
        return $this->testData;
    }
}