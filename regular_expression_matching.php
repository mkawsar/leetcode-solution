<?php

class Solution
{
    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($s, $p)
    {
        $m = strlen($s);
        $n = strlen($p);

        // Create a 2D table to store intermediate results
        $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, false));

        // Empty pattern matches empty string
        $dp[0][0] = true;

        // Handle patterns with '*'
        for ($j = 1; $j <= $n; $j++) {
            if ($p[$j - 1] === '*') {
                $dp[0][$j] = $dp[0][$j - 2];
            }
        }

        // Fill in the table using dynamic programming
        for ($i = 1; $i <= $m; $i++) {
            for ($j = 1; $j <= $n; $j++) {
                if ($p[$j - 1] === '.' || $p[$j - 1] === $s[$i - 1]) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                } elseif ($p[$j - 1] === '*') {
                    $dp[$i][$j] = $dp[$i][$j - 2];
                    if ($p[$j - 2] === '.' || $p[$j - 2] === $s[$i - 1]) {
                        $dp[$i][$j] = $dp[$i][$j] || $dp[$i - 1][$j];
                    }
                } else {
                    $dp[$i][$j] = false;
                }
            }
        }

        return $dp[$m][$n];
    }
}

$string = "aab";
$pattern = "c*a*b";

echo (new Solution())->isMatch($string, $pattern);