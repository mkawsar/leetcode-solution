<?php


class Solution
{
    function longestPalindrome($s)
    {
        $n = strlen($s);
        $start = 0; // Start index of the longest palindromic substring
        $maxLength = 1; // Length of the longest palindromic substring

        // Initialize a 2D array to store the intermediate results
        $dp = array_fill(0, $n, array_fill(0, $n, false));

        // All individual characters are palindromes
        for ($i = 0; $i < $n; $i++) {
            $dp[$i][$i] = true;
        }

        // Check for palindromic substrings of length 2
        for ($i = 0; $i < $n - 1; $i++) {
            if ($s[$i] === $s[$i + 1]) {
                $dp[$i][$i + 1] = true;
                $start = $i;
                $maxLength = 2;
            }
        }

        // Check for palindromic substrings of length greater than 2
        for ($k = 3; $k <= $n; $k++) {
            for ($i = 0; $i < $n - $k + 1; $i++) {
                $j = $i + $k - 1;
                if ($dp[$i + 1][$j - 1] && $s[$i] === $s[$j]) {
                    $dp[$i][$j] = true;
                    $start = $i;
                    $maxLength = $k;
                }
            }
        }

        // Extract the longest palindromic substring from the original string
        $longestSubstring = substr($s, $start, $maxLength);

        return $longestSubstring;
    }
}

echo (new Solution())->longestPalindrome('babad');
