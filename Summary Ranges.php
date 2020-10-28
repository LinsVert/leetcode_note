<?php


class Solution {

    /**
     * @param Integer[] $nums
     * @return String[]
     */
    function summaryRanges($nums) {
        $last = null;
        $nowIndex = 0;
        $_nums = [];
        foreach($nums as $value) {
            if ($last === null) {
                $last = $value;
                $_nums[$nowIndex] = (string) $value;
                echo $_nums[$nowIndex] . ' 1 '. PHP_EOL;
                continue;
            }
            if ($value - 1 == $last) {
                $tmp = explode('->', $_nums[$nowIndex]);
                $_nums[$nowIndex] = $tmp[0] . '->' . $value;
                echo $_nums[$nowIndex] . ' 2 '. PHP_EOL;
            } else {
                $nowIndex++;
                $_nums[$nowIndex] = (string) $value;
                echo $_nums[$nowIndex] . ' 3 '. PHP_EOL;
            }
            $last = $value;
        }
        return $_nums;
    }
}

$obj = new Solution();

$nums = [-1,0,1,2,3,4,5,6,7,8];
$res = $obj->summaryRanges($nums);

echo json_encode($res) . PHP_EOL;