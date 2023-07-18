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
    /**
     * Kata of "Who likes it?"
     * @param array $names array of names
     * @return string he display text as shown in the examples:

    []                                -->  "no one likes this"
    ["Peter"]                         -->  "Peter likes this"
    ["Jacob", "Alex"]                 -->  "Jacob and Alex like this"
    ["Max", "John", "Mark"]           -->  "Max, John and Mark like this"
    ["Alex", "Jacob", "Mark", "Max"]  -->  "Alex, Jacob and 2 others like this"
     */
    public static function likes(array $names): string
    {
        $resultString = "no one likes this";
        if (empty($names))
        {
            return $resultString;
        }
        elseif (count($names) == 1)
        {
            $name = $names[0];
            $resultString = $name . " likes this";
            return $resultString;
        }
        elseif (count($names) == 2)
        {
            $name1 = $names[0];
            $name2 = $names[1];
            $resultString = $name1 . " and " . $name2 . " like this";
            return $resultString;
        }
        elseif (count($names) == 3)
        {
            $name1 = $names[0];
            $name2 = $names[1];
            $name3 = $names[2];
            $resultString = $name1 . ", " . $name2 . " and " . $name3 . " like this";
            return $resultString;
        }
        else
        {
            $name1 = $names[0];
            $name2 = $names[1];
            $countAfter = count($names) - 2;
            $resultString = $name1 . ", " . $name2 . " and " . $countAfter . " others like this";
            return $resultString;
        }
    }
}

echo "<pre>";
print_r(Kata::squareProduct(256));
echo "<pre/>";

