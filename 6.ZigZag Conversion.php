<?php
class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     * 暴力轮询方式
     * 思路简单 暴力循环 丢进二维数组 最后输出
     */
    function convert($s, $numRows) {
        $len = strlen($s);
        if ($len <= $numRows) {
            return $s;
        }
        $fill = [];
        $zigzag_flag = false;
        $_len = 0;
        $final = -1;
        for ($i = 0;;) {
            for ($j = 0;$j < $numRows;$j++) {
                if (!$zigzag_flag) {
                    if ($_len < $len) {
                        $fill[$j][$i] = $s[$_len];
                        $_len ++;
                    }
                    $final ++;
                } else {
                    $final --;
                    if ($_len < $len) {
                        $fill[$final][$i] = $s[$_len];
                        $_len ++;
                    }
                    if ($final == 1 || $final == 0) {
                        $final = -1;
                        $zigzag_flag = false;
                    }
                    break;
                }
            }
            if ($final > -1 && $final != 1) {
                $zigzag_flag = true;
            } else {
                $final = -1;
            }
            if ($_len >= $len) {
                break;
            }
            $i ++;
        }
        $fill = implode('', array_map(function ($item) {
            return implode('', $item);
        }, $fill));
        return $fill;
    }

    /**
     * 动态规划形式
     * 因zigzag有一定规律是可归纳的 所以对应下一步的位置是可以根据上一步推出
     * 所以只有循环字符串就能够给出答案 O(n)
     * 具体思考过程如下：
     * 假定一个一维数组 index 表示这个zigzag字符它存放的位置
     * 1.在index循环到 numRows - 1时 下一个数的位置 必然是 index - 1 同理index = 0 时 下一个字符串的位置必然是 index + 1
     * 2. 对于 +1 还是 -1 可以用个标志位来判断 故为动态规划
     */
    function convert2($s, $numRows) {
        $len = strlen($s);
        if ($numRows == 1 || $len <= $numRows) {
            return $s;
        }
        $arr = [];
        //起始坐标0
        $index = 0;
        //初始步长1
        $step = 1;
        for ($i = 0;$i < $len; $i++) {
            if (isset($arr[$index])) {
                $arr[$index] .= $s[$i];
            } else {
                $arr[$index] = $s[$i];
            }
            //进行判断步长
            if ($index == 0) {
                $step = 1;
            } elseif ($index == $numRows - 1) {
                $step = -1;
            }
            $index += $step;
        }
        $arr = implode('', $arr);
        return $arr;
    }
}

$test = new Solution();
echo $test->convert('PAYPALISHIRING', 3) . PHP_EOL;
echo $test->convert2('PAYPALISHIRING', 3);