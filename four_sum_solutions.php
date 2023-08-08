<?php

class FourSumSolutions
{
    function fourSum($nums, $target)
    {
        sort($nums);
        $result = [];

        $length = count($nums);

        for ($i = 0; $i < $length - 3; $i++) {
            if ($i > 0 && $nums[$i] === $nums[$i - 1]) {
                continue;
            }

            for ($j = $i + 1; $j < $length - 2; $j++) {
                if ($j > $i + 1 && $nums[$j] === $nums[$j - 1]) {
                    continue;
                }

                $left = $j + 1;
                $right = $length - 1;

                while ($left < $right) {
                    $sum = $nums[$i] + $nums[$j] + $nums[$left] + $nums[$right];

                    if ($sum < $target) {
                        $left++;
                    } elseif ($sum > $target) {
                        $right--;
                    } else {
                        $result[] = [$nums[$i], $nums[$j], $nums[$left], $nums[$right]];

                        while ($left < $right && $nums[$left] === $nums[$left + 1]) {
                            $left++;
                        }
                        while ($left < $right && $nums[$right] === $nums[$right - 1]) {
                            $right--;
                        }

                        $left++;
                        $right--;
                    }
                }
            }
        }

        return $result;
    }
}
$nums = [1, 0, -1, 0, -2, 2];
$target = 0;

echo (new FourSumSolutions())->fourSum($nums, $target);
