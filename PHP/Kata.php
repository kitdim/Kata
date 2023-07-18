<?php

class Kata
{
    /**
     * Kata of "Find the divisors!"
     * @param int $integer integer number
     * @return array|string array with all the integer's divisors
     */
    public static function divisors(int $integer): array|string
    {
        if (Kata::isPrime($integer)) {
            return "{$integer} is prime";
        }

        $divisor = [];
        for ($i = 2; $i < $integer; $i++) {
            if ($integer % $i == 0) {
                $divisor[] = $i;
            }
        }
        return $divisor;
    }

    private static function isPrime($num): bool
    {
        if ($num == 1) {
            return false;
        }

        if ($num == 2) {
            return true;
        }

        if ($num % 2 == 0) {
            return false;
        }

        $ceil = ceil(sqrt($num));
        for ($i = 3; $i <= $ceil; $i = $i + 2) {
            if ($num % $i == 0)
                return false;
        }
        return true;
    }

    /**
     * Kata of "Stop gninnipS My sdroW!"
     * @param string $str string of one or more words
     * @return string the same string, but with all five or more letter words reversed
     */
    public static function spinWords(string $str): string
    {
        $words = explode(" ", $str);
        $index = 0;
        while (count($words) > $index) {
            $word = $words[$index];
            if (strlen($word) >= 5) {
                $words[$index] = strrev($word);
            }
            $index++;
        }

        return join(" ", $words);
    }
    /**
     * Kata of "Product of two squares"
     * @param int $n integer (n)
     * @return array return an array equivalent to [[1,16],[2,8],[4,4]].
     * i.e. it could be [[1,16],[2,8],[4,4]] or [[2,8],[4,4],[1,16]] or [[8,2],[4,4],[1,16]] etc
     */
    public static function squareProduct(int $n): array
    {
        $arr = array();
        for($x = 1 ; $x <= sqrt(sqrt(floatval($n))); $x ++){
            $d_x = $x * $x;
            $v_x = $n / $d_x;
            if( $n % ($x * $x) == 0 && ceil(sqrt($v_x)) == sqrt($v_x)){
                array_push($arr, array($x, sqrt($v_x)));
            }
        }
        return $arr;
    }

}

echo "<pre>";
print_r(Kata::squareProduct(256));
echo "<pre/>";

