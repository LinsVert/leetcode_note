<?php

class Solution {

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) {
    	$returns = [];
        foreach ($candidates as $key => $value) {
        	$diff = $target - $value;
        	if ($diff < 0 ) continue;
        	if ($diff == 0) {
        		$returns[$value] = [$value];
        		continue;
        	}
			$_returns = $this->combinationSum($candidates, $diff);
        	if ($_returns) {
        		foreach ($_returns as &$vv) {
					$vv = array_merge([$value], $vv);
					sort($vv);
					$returns[implode('.', $vv)] = $vv;
        		}
				unset($vv);
        	}
		}
		$returns = array_values($returns);
        return $returns;
    }
}

$obj = new Solution();

echo json_encode($obj->combinationSum([2,3,5], 8)) . PHP_EOL;
// var_dump($obj->combinationSum([2,3,6,7], 7));