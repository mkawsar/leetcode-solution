<?php

// The "Next Permutation" problem involves finding the next greater permutation of a given sequence of numbers
class Solutions
{
    /**
     * @param Integer[] $nums
     * @return NULL
     */

    function nextPermutation(&$nums) 
    {
        $n = count($nums);
        $i = $n - 2;
        // Find the first decreasing element from the right
        while ($i >= 0 && $nums[$i] >= $nums[$i + 1]) {
            $i--;
        }

        if ($i >= 0) {
            // Find the smallest element to the right of $i that is greater than $nums[$i]
            $j = $n - 1;
            while ($nums[$j] <= $nums[$i]) {
                $j--;
            }

            // Swap $nums[$i] and $nums[$j]
            list($nums[$i], $nums[$j]) = array($nums[$j], $nums[$i]);
        }

        // Reverse the subarray to the right of $i
        $left = $i + 1;
        $right = $n - 1;

        while ($left < $right) {
            list($nums[$left], $nums[$right]) = array($nums[$right], $nums[$left]);
            $left++;
            $right--;
        }
    }
}

$nums = [1, 2, 3];

$object = new Solutions();

$result = $object->nextPermutation($nums);

print_r($nums);
