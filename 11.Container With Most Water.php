<?php

class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $max = 0;
        $len = count($height);
        for ($i = 0; $i < $len - 1;$i++) {
        	for ($j = $i + 1;$j < $len;$j++) {
        		$m = $height[$i] < $height[$j] ? $height[$i] : $height[$j];
        		$area = $m * ($j - $i);
        		$max = $max > $area ? $max : $area;
        	}
        }
        return $max;
    }
}

$b = [1,8,6,2,5,4,8,3,7];
$a = new Solution();
echo $a->maxArea($b);