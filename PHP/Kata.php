<?php

class Kata
{
    /**
     * @param int $integer integer number
     * @return array|string array with all the integer's divisors
     */
    public static function divisors(int $integer): array|string
    {
        if(Kata::isPrime($integer)) {
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
    private static function isPrime($num) : bool
    {
        if($num == 1) {
            return false;
        }

        if($num == 2) {
            return true;
        }

        if($num % 2 == 0) {
            return false;
        }

        $ceil = ceil(sqrt($num));
        for($i = 3; $i <= $ceil; $i = $i + 2) {
            if($num % $i == 0)
                return false;
        }

        return true;
    }
}