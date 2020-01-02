<?php

class Solution {

    private $max = 0;
    private $min = 0;
    /**
     * @param String $s
     * @return String
     * 看了大佬们的提交才做出来的：
     * 1.从index i 开始判断字符 s 从 i-- 到 i++ 找到不同为止
     * 2. 存在一个特殊情况就是 abba这种 中间有2个一样的不能判断到 所以 要再加一个 i, i + 1
     * 3. 使用一个函数调用 最后获得最大的区间值
     */
    function longestPalindrome($s) {
        $len = strlen($s);
        if ($len <= 1) {
            return $s;
        }
        for ($i = 0;$i <= $len - 1;$i++) {
            $this->find($s, $i, $i);
            $this->find($s, $i, $i + 1);
        }
        return substr($s, $this->min, $this->max);
    }
    function find($s, $i, $j) {
        //重复直到找到不同
        while($i >= 0 && $j < strlen($s) && $s[$i] == $s[$j]) {
            $i --;
            $j ++;
        }
        //当前取出的index 比max 大 则变更
        if ($this->max < $j - $i - 1) {
            //起点赋值
            $this->min = $i + 1;
            $this->max = $j - $i - 1;
        }
    }
}

$test = new Solution();
echo $test->longestPalindrome('cbbd') . PHP_EOL;
echo $test->longestPalindrome('abbddeeae') . PHP_EOL;