<?php

namespace Laracon\basic;

class WS3
{
    // FizzBuzz を返す
    public function fizzBuzz(int $num): string
    {
        $result = "";

        if ($num % 3 === 0) {
            $result .= "Fizz";
        }

        if ($num % 5 === 0) {
            $result .= "Buzz";
        }

        if (!($num % 3 === 0) && !($num % 5 === 0)) {
            $result = $num;
        }
        return $result;
    }
}
