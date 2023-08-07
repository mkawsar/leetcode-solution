<?php

class Solution
{
    function threeSum($nums)
    {
        $result = [];
        $length = count($nums);

        sort($nums);

        for ($i = 0; $i < $length - 2; $i++) {
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) {
                continue; // Skip duplicates
            }

            $target = -$nums[$i];
            $left = $i + 1;
            $right = $length - 1;

            while ($left < $right) {
                $sum = $nums[$left] + $nums[$right];

                if ($sum < $target) {
                    $left++;
                } elseif ($sum > $target) {
                    $right--;
                } else {
                    $result[] = [$nums[$i], $nums[$left], $nums[$right]];

                    while ($left < $right && $nums[$left] == $nums[$left + 1]) {
                        $left++;
                    }
                    while ($left < $right && $nums[$right] == $nums[$right - 1]) {
                        $right--;
                    }

                    $left++;
                    $right--;
                }
            }
        }

        return $result;
    }
}

$nums = [-1, 0, 1, 2, -1, -4];
echo (new Solution())->threeSum($nums);