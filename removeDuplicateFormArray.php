<?php

/**
 * Leetcode problem 26
 * Remove Duplicates from Sorted Array
 */

 class Solution
 {
    function removeDuplicates(&$nums) {
        $n = count($nums);
        if ($n <= 1) {
            return $n;
        }
        
        $uniqueIndex = 0;
        
        for ($i = 1; $i < $n; $i++) {
            if ($nums[$i] != $nums[$uniqueIndex]) {
                $uniqueIndex++;
                $nums[$uniqueIndex] = $nums[$i];
            }
        }
        
        return $uniqueIndex + 1;
    }
 }

 $nums = [1, 1, 2, 2, 2, 3, 4, 4, 5];

 echo (new Solution())->removeDuplicates($nums);
