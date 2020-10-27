<?php


// Symbol       Value
// I             1
// V             5
// X             10
// L             50
// C             100
// D             500
// M             1000
class Solution {

    /**
     * @param Integer $num
     * @return String
     */
    function intToRoman($num) {
        $str = '';
        if ($num >= 1000) {
            $th = floor($num / 1000);
            for ($i = 0; $i < $th; $i++) {
                $str .= 'M';
            }
        }
        $num = $num % 1000;
        if ($num >= 100) {
            $th = floor($num / 100);
            if ($th == 4) {
                $str .= 'CD';
            } elseif ($th == 9) {
                $str .= 'CM';
            } elseif ($th < 4) {
                for ($i = 0; $i < $th; $i++) {
                    $str .= 'C';
                }
            } elseif ($th == 5) {
                $str .= 'D';
            } elseif ($th > 5) {
                $str .= 'D';
                for ($i = 0; $i < $th - 5; $i++) {
                    $str .= 'C';
                }
            }
        }
        $num = $num % 100;
        if ($num >= 10) {
            $th = floor($num / 10);
            if ($th == 4) {
                $str .= 'XL';
            } elseif ($th == 9) {
                $str .= 'XC';
            } elseif ($th < 4) {
                for ($i = 0; $i < $th; $i++) {
                    $str .= 'X';
                }
            } elseif ($th == 5) {
                $str .= 'L';
            } elseif ($th > 5) {
                $str .= 'L';
                for ($i = 0; $i < $th - 5; $i++) {
                    $str .= 'X';
                }
            }
        }
        $num = $num % 10;
        if ($num >= 1) {
            $th = floor($num / 1);
            if ($th == 4) {
                $str .= 'IV';
            } elseif ($th == 9) {
                $str .= 'IX';
            } elseif ($th < 4) {
                for ($i = 0; $i < $th; $i++) {
                    $str .= 'I';
                }
            } elseif ($th == 5) {
                $str .= 'V';
            } elseif ($th > 5) {
                $str .= 'V';
                for ($i = 0; $i < $th - 5; $i++) {
                    $str .= 'I';
                }
            }
        }
        return $str;
    }
}

$a = new Solution();
echo $a->intToRoman(3888);