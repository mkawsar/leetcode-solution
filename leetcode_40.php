<?php

//The "Combination Sum II" problem on LeetCode involves finding all unique combinations in candidates (an array of distinct integers) that sum up to a target. Each number in candidates may only be used once in the combination, and the result should not contain duplicate combinations
class CombinationSumTwoSolution
{
    public function combinationSum2(array $candidates, int $target): array
    {
        $result = [];
        $current = [];
        $start = 0;

        // Sort candidates to handle duplicates
        sort($candidates);

        // Start the backtracking process
        $this->backtrack($candidates, $target, $start, $current, $result);

        return $result;
    }

    private function backtrack($candidates, $target, $start, $current, &$result)
    {
        // If the target becomes negative, stop exploring this path
        if ($target < 0) {
            return;
        }

        // If the target becomes zero, we found a valid combination, add it to the result
        if ($target === 0) {
            $result[] = $current;
            return;
        }

        // Iterate through candidates starting from the current index
        for ($i = $start; $i < count($candidates); $i++) {
            // Skip duplicates to avoid duplicate combinations
            if ($i > $start && $candidates[$i] == $candidates[$i - 1]) {
                continue;
            }

            // Choose the candidate
            $current[] = $candidates[$i];

            // Explore further with the same candidate, but skip it in the next iteration
            $this->backtrack($candidates, $target - $candidates[$i], $i + 1, $current, $result);

            // Backtrack by removing the last added candidate
            array_pop($current);
        }
    }
}

// Example usage
$candidates = [10, 1, 2, 7, 6, 1, 5];
$target = 8;
$class = new CombinationSumTwoSolution();

$result = $class->combinationSum2($candidates, $target);

// Print the result
foreach ($result as $combination) {
    echo "[" . implode(", ", $combination) . "]\n";
}
