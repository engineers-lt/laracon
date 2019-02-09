<?php
/**
 * Created by PhpStorm.
 * User: fortegp05
 */

use Laracon\authentic\q002\YamanoteLine;
use PHPUnit\Framework\TestCase;

/**
 * Class YamanoteLineTest
 */
class YamanoteLineTest extends TestCase
{
    private $yamanoteLine;

    /**
     * 初期設定
     */
    public function setUp()
    {
        $this->yamanoteLine = new YamanoteLine();
    }

    /**
     * 開始駅テスト
     */
    public function test_startStationIsTokyo()
    {
        $this->assertSame('東京駅', $this->yamanoteLine->nowStation(), '東京から始まっているか?');
    }

    /**
     * 東京からの内回りテスト
     */
    public function test_uchimawari()
    {
        $this->assertSame('神田駅', $this->yamanoteLine->nextStationUchimawari(), '内回りの駅確認');
    }

    /**
     * 東京からの外回りテスト
     */
    public function test_sotomawari()
    {
        $this->assertSame('有楽町駅', $this->yamanoteLine->nextStationSotomawari(), '外回りの駅確認');
    }

    /**
     * 内回りのループ確認
     */
    public function test_loopUchimawari()
    {
        for ($i = 0; $i < 29; $i++) {
            $this->yamanoteLine->moveCursorUchimawari();
        }
        $this->assertSame('東京駅', $this->yamanoteLine->nextStationUchimawari(), '内回りのループ確認');
    }

    /**
     * 外回りのループ確認
     */
    public function test_loopSotomawari()
    {
        for ($i = 0; $i < 29; $i++) {
            $this->yamanoteLine->moveCursorSotomawari();
        }
        $this->assertSame('東京駅', $this->yamanoteLine->nextStationSotomawari(), '外回りのループ確認');
    }

    /**
     * リセット後の駅確認テスト
     */
    public function test_resetCursorIsTokyo()
    {
        $this->yamanoteLine->moveCursorUchimawari();
        $this->yamanoteLine->reset();
        $this->assertSame('東京駅', $this->yamanoteLine->nowStation(), '東京にリセットされるか?');
    }
}