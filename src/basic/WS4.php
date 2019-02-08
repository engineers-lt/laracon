<?php

namespace Laracon\basic;

class WS4
{
    // 月の日数 を返す
    public function getDays(int $month): int
    {
        switch ($month) {
            case 4:
            case 6:
            case 9:
            case 11:
                return 30;
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 12:
                return 31;
            case 2:
                return 28;
            default:
                throw new \InvalidArgumentException("引数は1-12で入力してください。");
        }
    }
}
