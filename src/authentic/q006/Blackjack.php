<?php

namespace Laracon\authentic\q006;

/**
 * Created by PhpStorm.
 * User: fortegp05
 */

/**
 * テスト内容の説明
 *   簡易的なブラックジャックゲームをテストする問題。
 *   乱数で結果が変わる処理をどうテストするか?
 *   結果が標準出力の場合はどうするチェックするか?
 *   昔のバッチ処理などに使えるかと思います。
 *   ぜひ、ヒントを見ながら解いてみてください。
 *
 * テストのヒント
 *  // リフレクションとアクセス権限のセット
 *  new \ReflectionClass(ClassName)
 *  getMethod
 *  getProperty
 *  setAccessible
 *  setValue($class, value)
 *
 *  // 標準出力の取得。
 *  ob_start();
 *  $var = ob_get_clean();
 */

/**
 * Class Blackjack
 * ルール：カードを引いていき、21を超えたら負け。
 * 21以下で勝負した時にディーラー(COM)との比較で21に近い方が勝ち。
 * 同じ場合は引き分け。
 * それ以外のルールはなし。
 */
class Blackjack
{
    const SPADE = 'spade';
    const HEART = 'heart';
    const DIAMOND = 'diamond';
    const CLUB = 'club';
    private $myPoint;
    private $dealerPoint;
    private $cards = [
        self::SPADE => [],
        self::HEART => [],
        self::DIAMOND => [],
        self::CLUB => []
    ];
    private $suits = [self::SPADE, self::HEART, self::DIAMOND, self::CLUB];

    /**
     *
     */
    public function gameStart(): void
    {
        $this->initGame();
        $this->stdout('簡易ブラックジャック開始!');
        $this->playGame();
    }

    /**
     *
     */
    private function playGame(): void
    {
        while ($this->showOrder()) {
            // ゲーム中…
        }
        $this->gameSet();
    }

    private function initGame(): void
    {
        $this->initCard();
        $this->initHand();
    }

    /**
     *
     */
    private function initCard()
    {
        foreach ($this->cards as $suit => $suitCards) {
            $this->cards[$suit] = [];
            for ($i = 0; $i < 13; $i++) {
                $this->cards[$suit][] = ($i + 1);
            }
        }
    }

    /**
     *
     */
    private function initHand()
    {
        $this->myPoint = 0;
        $this->dealerPoint = 0;
    }

    /**
     * @return bool
     */
    private function showOrder()
    {
        $this->stdout('コマンド?');
        $this->stdout('1.カードを引く');
        $this->stdout('2.カードオープン');
        $stdin = trim(fgets(STDIN));

        switch (true) {
            case $stdin === '1':
                return $this->dealCards();
            case $stdin === '2':
                $this->cardOpen();
                return false;
            default:
                $this->stdout('正しいコマンドを選択してください。');
                return true;
        }
    }

    /**
     *
     */
    private function cardOpen()
    {
        $resultMessage = 'あなたは' . $this->myPoint . '点、ディーラーは' . $this->dealerPoint . '点で、';
        switch (true) {
            case $this->myPoint === $this->dealerPoint:
                $resultMessage .= '引き分けです!';
                break;
            case $this->myPoint === 21:
                $resultMessage .= 'あなたの勝ちです!';
                break;
            case $this->dealerPoint === 21:
                $resultMessage .= 'ディーラーの勝ちです!';
                break;
            case $this->myPoint < 21 && $this->dealerPoint < $this->myPoint:
                $resultMessage .= 'あなたの勝ちです!';
                break;
            case $this->dealerPoint < 21 && $this->myPoint < $this->dealerPoint:
                $resultMessage .= 'ディーラーの勝ちです!';
                break;
            case 21 < $this->myPoint && 21 < $this->dealerPoint:
                $resultMessage .= '引き分けです!';
                break;
            default:
                $resultMessage .= '想定外です!';
                break;
        }
        $this->stdout($resultMessage);
    }

    /**
     *
     */
    private function dealCards(): bool
    {
        $this->myPoint += $this->pullCard();
        $this->stdout('あなたの合計値は' . $this->myPoint . 'です。');
        $this->dealerPoint += $this->pullCard();

        switch (true) {
            case $this->myPoint > 21:
                $this->stdout('あなたはバーストしました!');
                return false;
            case $this->dealerPoint > 21:
                $this->stdout('ディーラーはバーストしました!');
                return false;
            default:
                return true;
        }
    }

    /**
     * @return mixed
     */
    private function pullCard()
    {
        $suit = $this->suits[rand(0, 3)];
        return array_splice($this->cards[$suit], rand(0, (count($this->cards[$suit]) - 1)), 1)[0];
    }

    /**
     *
     */
    private function gameSet()
    {
        $this->stdout('ゲーム終了!');
        $this->stdout('お疲れ様でした!');
    }

    /**
     * @param string $text
     */
    private function stdout(string $text)
    {
        echo $text . PHP_EOL;
    }
}