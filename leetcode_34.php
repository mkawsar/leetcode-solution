<?php

class Solutions
{
    // The problem Find First and Last Position of Element in Sorted Array involves finding the first and last occurrence of a target element in a sorted array.
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target)
    {
        $first = $this->findFirst($nums, $target);
        $last = $this->findLast($nums, $target);
        return [$first, $last];
    }

    function findFirst($nums, $target) 
    {
        $left = 0;
        $right = count($nums) - 1;
        $result = -1;
        while ($left <= $right) {
            $mid = $left + intval(($right - $left) / 2);
            if ($nums[$mid] == $target) {
                $result = $mid;
                $right = $mid - 1;  // Continue searching in the left half
            } elseif ($nums[$mid] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return $result;
    }

    function findLast($nums, $target)
    {
        $left = 0;
        $right = count($nums) - 1;
        $result = -1;

        while ($left <= $right) {
            $mid = $left + intval(($right - $left) / 2);
            if ($nums[$mid] == $target) {
                $result = $mid;
                $left = $mid + 1;  // Continue searching in the right half
            } elseif ($nums[$mid] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return $result;
    }
}
