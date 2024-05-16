<?php

class JumpGameSolution 
{
    /**
     * @param mixed $nums
     * 
     * @return [type]
     */
    function jump($nums) 
    {
        $n = count($nums);
        if ($n <= 1) {
            return 0;
        }

        $maxReach = $nums[0];
        $steps = $nums[0];
        $jumps = 1;

        for ($i = 1; $i < $n; $i++) {
            if ($i == $n - 1) {
                return $jumps;
            }

            $maxReach = max($maxReach, $i + $nums[$i]);
            $steps--;

            if ($steps == 0) {
                $jumps++;
                $steps = $maxReach - $i;
            }
        }

        return 0;
    }
}

$solver = new JumpGameSolution();
// Example usage
$nums = [2,3,1,1,4];
echo "Minimum number of jumps needed: " . $solver->jump($nums);
