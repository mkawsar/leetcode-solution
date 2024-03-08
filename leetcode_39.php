<?php

class CombinationSumSolutions
{
    /**
     * @param Integer[] $candidates
     * @param Integer $target
     */
    public function combinationSum($candidates, $target): array
    {
        $result = [];
        $current = [];
        $start = 0;

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
            // Choose the candidate
            $current[] = $candidates[$i];

            // Explore further with the same candidate, as it can be repeated
            $this->backtrack($candidates, $target - $candidates[$i], $i, $current, $result);

            // Backtrack by removing the last added candidate
            array_pop($current);
        }
    }
}

// Example usage
$candidates = [2, 3, 6, 7];
$target = 7;

$object = new CombinationSumSolutions();

$result = $object->combinationSum($candidates, $target);

// Print the result
foreach ($result as $combination) {
    echo "[" . implode(", ", $combination) . "]\n";
}
