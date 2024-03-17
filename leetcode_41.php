<?php

class FirstMissingPositiveSolution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function firstMissingPositive(array $nums): int
    {
        $n = count($nums);

        // Step 1: Replace negative numbers and zeros with a number greater than n
        for ($i = 0; $i < $n; $i++) {
            if ($nums[$i] <= 0) {
                $nums[$i] = $n + 1;
            }
        }

        // Step 2: Mark indices of present numbers as negative
        for ($i = 0; $i < $n; $i++) {
            $num = abs($nums[$i]);
            if ($num <= $n) {
                $nums[$num - 1] = -abs($nums[$num - 1]);
            }
        }

        // Step 3: Find the first positive number's index
        for ($i = 0; $i < $n; $i++) {
            if ($nums[$i] > 0) {
                return $i + 1; // The first missing positive number
            }
        }

        // Step 4: All numbers are present, return the next positive number
        return $n + 1;
    }
}

// Example usage
$nums = [3, 4, -1, 1];
$object = new FirstMissingPositiveSolution();
$result = $object->firstMissingPositive($nums);
echo $result;
