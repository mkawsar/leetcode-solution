<?php

/**
 * Leetcode problem 27
 * The "Remove Element" problem involves removing all instances of a specific value from an array in-place and returning the new length of the array.
 */

 class Solutions
 {
    function removeElement(&$nums, $val) {
        $n = count($nums);
        $newLength = 0;
    
        for ($i = 0; $i < $n; $i++) {
            if ($nums[$i] != $val) {
                $nums[$newLength] = $nums[$i];
                $newLength++;
            }
        }
    
        return $newLength;
    }
 }

 // Example usage
$nums = [3, 2, 2, 3, 4, 5, 3];
$val = 3;

echo (new Solutions())->removeElement($nums, $val);