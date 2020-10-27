<?php

class RecentCounter {
    /**
     */
    function __construct() {
        
    }
    
    public $t = [];

    /**
     * @param Integer $t
     * @return Integer
     */
    function ping($t) {
        $nums = 1;
        $pingTime = 3000;
        // if (!$this->t) {
        //     $this->t[] = $t;
        //     return $nums;
        // }
        $count = count($this->t);
        // $allowCount = $count;
        $i = 0;
        $j = $count - 1;
        $jT = [];
        $break = 0;
        do {
            if ($t - $this->t[$i] <= $pingTime) {
                $break = 1;
                // $allowCount = $count - $i;
                break;
            } else {
                unset($this->t[$i]);
                $i ++;
            }
            if ($t - $this->t[$j] > $pingTime) {
                // $allowCount = $count - $j - 1;
                $break = 2;
                break;
            } else {
                $jT[] = $this->t[$j];
                $j --;
            }
        } while($i <= $j);

        if ($break == 2) {
            $jT = array_reverse($jT);
            $this->t = $jT;
        } else {
            $this->t = array_values($this->t);
        }
        $allowCount = count($this->t);
        $this->t[] = $t;
        return $nums + $allowCount;
    }
}

$obj = new RecentCounter();
echo $obj->ping(825) . PHP_EOL;
echo $obj->ping(2295) . PHP_EOL;
echo $obj->ping(4131) . PHP_EOL;
echo $obj->ping(5455) . PHP_EOL;
echo $obj->ping(5884) . PHP_EOL;
echo $obj->ping(5975) . PHP_EOL;

/**
 * Your RecentCounter object will be instantiated and called as such:
 * $obj = RecentCounter();
 * $ret_1 = $obj->ping($t);
 */