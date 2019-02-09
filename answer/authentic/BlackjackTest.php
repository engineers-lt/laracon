<?php

use Laracon\authentic\q006\Blackjack;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: fortegp05
 */
class BlackjackTest extends TestCase
{
    private $blackjack;
    private $methodCardOpen;
    private $propertyMyPoint;
    private $propertyDealerPoint;

    /**
     * 初期設定
     */
    public function setUp()
    {
        $this->blackjack = new Blackjack();
        $blackjackReflection = new \ReflectionClass($this->blackjack);

        $this->methodCardOpen = $blackjackReflection->getMethod('cardOpen');
        $this->methodCardOpen->setAccessible(true);

        $this->propertyMyPoint = $blackjackReflection->getProperty('myPoint');
        $this->propertyMyPoint->setAccessible(true);

        $this->propertyDealerPoint = $blackjackReflection->getProperty('dealerPoint');
        $this->propertyDealerPoint->setAccessible(true);
    }

    /**
     * 引き分けテスト
     */
    public function test_cardOpenDraw()
    {
        $playerPoint = 21;
        $dealerPoint = 21;
        $this->propertyMyPoint->setValue($this->blackjack, $playerPoint);
        $this->propertyDealerPoint->setValue($this->blackjack, $dealerPoint);

        ob_start();
        $this->methodCardOpen->invoke($this->blackjack);
        $actual = ob_get_clean();

        $this->assertSame('あなたは' . $playerPoint . '点、ディーラーは' . $dealerPoint . '点で、引き分けです!' . PHP_EOL, $actual, '引き分け');
    }

    /**
     * プレイヤー勝利テスト ブラックジャック
     */
    public function test_cardOpenPlayerWinBlackjack()
    {
        $playerPoint = 21;
        $dealerPoint = 10;
        $this->propertyMyPoint->setValue($this->blackjack, $playerPoint);
        $this->propertyDealerPoint->setValue($this->blackjack, $dealerPoint);

        ob_start();
        $this->methodCardOpen->invoke($this->blackjack);
        $actual = ob_get_clean();

        $this->assertSame('あなたは' . $playerPoint . '点、ディーラーは' . $dealerPoint . '点で、あなたの勝ちです!' . PHP_EOL, $actual, '引き分け');
    }

    /**
     * プレイヤー勝利テスト 21に近い
     */
    public function test_cardOpenPlayerWin()
    {
        $playerPoint = 20;
        $dealerPoint = 10;
        $this->propertyMyPoint->setValue($this->blackjack, $playerPoint);
        $this->propertyDealerPoint->setValue($this->blackjack, $dealerPoint);

        ob_start();
        $this->methodCardOpen->invoke($this->blackjack);
        $actual = ob_get_clean();

        $this->assertSame('あなたは' . $playerPoint . '点、ディーラーは' . $dealerPoint . '点で、あなたの勝ちです!' . PHP_EOL, $actual, '引き分け');
    }

    /**
     * ディーラー勝利テスト ブラックジャック
     */
    public function test_cardOpenDealerWinBlackjack()
    {
        $playerPoint = 10;
        $dealerPoint = 21;
        $this->propertyMyPoint->setValue($this->blackjack, $playerPoint);
        $this->propertyDealerPoint->setValue($this->blackjack, $dealerPoint);

        ob_start();
        $this->methodCardOpen->invoke($this->blackjack);
        $actual = ob_get_clean();

        $this->assertSame('あなたは' . $playerPoint . '点、ディーラーは' . $dealerPoint . '点で、ディーラーの勝ちです!' . PHP_EOL, $actual, '引き分け');
    }

    /**
     * ディーラー勝利テスト 21に近い
     */
    public function test_cardOpenDealerWin()
    {
        $playerPoint = 10;
        $dealerPoint = 20;
        $this->propertyMyPoint->setValue($this->blackjack, $playerPoint);
        $this->propertyDealerPoint->setValue($this->blackjack, $dealerPoint);

        ob_start();
        $this->methodCardOpen->invoke($this->blackjack);
        $actual = ob_get_clean();

        $this->assertSame('あなたは' . $playerPoint . '点、ディーラーは' . $dealerPoint . '点で、ディーラーの勝ちです!' . PHP_EOL, $actual, '引き分け');
    }
}