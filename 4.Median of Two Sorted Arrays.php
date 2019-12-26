<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $nums1_len = count($nums1);
        $nums2_len = count($nums2);
        $parse_flag = ($nums1_len + $nums2_len) % 2 > 0 ? false : true;
        $median = intval(ceil(($nums1_len + $nums2_len) / 2));
        if (!$nums1 && !$nums2) {
            return false;
        }
        
        $i = 0;
        $j = $nums2_len - 1;
        while (true) {

        }
    }

}