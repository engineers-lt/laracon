<?php

namespace Laracon\authentic\q002;

/**
 * テスト内容の説明
 *  2問目は入力値以外の要素で出力が変わる場合です。
 *  同じ引数を入力していてもその他の要因、例えばDB接続に失敗したとか、
 *  どこかで例外が発生したとかそういった場合にどうテストを書いたらよいか?という問題です。
 *
 *  今回は山手線を例に、いま電車が山手線のどの駅にいるのか?、つまりカーソルをクラスのprivateなプロパティとして持っているクラスにテストを書いてもらいます。
 *  このクラスには内回り、外回りで電車を進める、つまりカーソルを進める処理が実装されていたり、単純に駅名を取り出す処理があります。
 *  これらを組み合わせて山手線に対するテストを書いてください。
 *
 * テストのヒント
 *  privateなプロパティをどうテストするか?テストする必要があるか?
 *  上限に対するテスト
 */

/**
 * Class YamanoteLine
 * @package LaravelJpCon\Question\q002
 */
class YamanoteLine
{
    // 東京から内回りで定義した駅名配列
    private $stations = [
        '東京駅',
        '神田駅',
        '秋葉原駅',
        '御徒町駅',
        '上野駅',
        '鶯谷駅',
        '日暮里駅',
        '西日暮里駅',
        '田端駅',
        '駒込駅',
        '巣鴨駅',
        '大塚駅',
        '池袋駅',
        '目白駅',
        '高田馬場駅',
        '新大久保駅',
        '新宿駅',
        '代々木駅',
        '原宿駅',
        '渋谷駅',
        '恵比寿駅',
        '目黒駅',
        '五反田駅',
        '大崎駅',
        '品川駅',
        '高輪ゲートウェイ駅',
        '田町駅',
        '浜松町駅',
        '新橋駅',
        '有楽町駅'
    ];
    private $cursor = 0;

    /**
     * 現在の駅を取得する(東京から始まる)
     * @return string
     */
    public function nowStation(): string
    {
        return $this->stations[$this->cursor];
    }

    /**
     * @return void
     */
    public function moveCursorUchimawari(): void
    {
        $this->cursor++;

        if ($this->cursor > (count($this->stations) - 1)) {
            $this->cursor = 0;
        }
    }

    /**
     * 外回りで駅を取得する(東京->神田->秋葉原->御徒町->上野…)
     * @return string
     */
    public function nextStationUchimawari(): string
    {
        // カーソル移動して駅名を取得する
        $this->moveCursorUchimawari();
        return $this->nowStation();
    }

    /**
     * @return void
     */
    public function moveCursorSotomawari(): void
    {
        $this->cursor--;

        if ($this->cursor < 0) {
            $this->cursor = count($this->stations) - 1;
        }
    }

    /**
     * 外回りで駅を取得する(東京->有楽町->新橋->浜松町…)
     * @return string
     */
    public function nextStationSotomawari(): string
    {
        // カーソル移動して駅名を取得する
        $this->moveCursorSotomawari();
        return $this->nowStation();
    }

    /**
     * 東京に戻す
     */
    public function reset(): void
    {
        $this->cursor = 0;
    }
}