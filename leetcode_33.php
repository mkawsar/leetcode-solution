<?php

class Solutions
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $left = 0;
        $right = count($nums) - 1;
    
        while ($left <= $right) {
            $mid = $left + intval(($right - $left) / 2);
    
            if ($nums[$mid] == $target) {
                return $mid;
            }
    
            if ($nums[$left] <= $nums[$mid]) {
                // Left half is sorted
                if ($nums[$left] <= $target && $target < $nums[$mid]) {
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            } else {
                // Right half is sorted
                if ($nums[$mid] < $target && $target <= $nums[$right]) {
                    $left = $mid + 1;
                } else {
                    $right = $mid - 1;
                }
            }
        }
    
        return -1; // Target not found
    }
}

$nums = [4, 5, 6, 7, 0, 1, 2];
$target = 0;
$class = new Solutions();
$result = $class->search($nums, $target);
echo "Index of $target: $result\n";
