<?php

class Solution
{
    function threeSumClosest($nums, $target)
    {
        sort($nums);
        $closestSum = PHP_INT_MAX;

        for ($i = 0; $i < count($nums) - 2; $i++) {
            $left = $i + 1;
            $right = count($nums) - 1;

            while ($left < $right) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];

                if (abs($sum - $target) < abs($closestSum - $target)) {
                    $closestSum = $sum;
                }

                if ($sum < $target) {
                    $left++;
                } elseif ($sum > $target) {
                    $right--;
                } else {
                    return $target;
                }
            }
        }

        return $closestSum;
    }
}

$nums = [-1, 2, 1, -4];
$target = 1;
echo (new Solution())->threeSumClosest($nums, $target);