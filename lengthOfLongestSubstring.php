<?php

use Solution as GlobalSolution;

class Solution
{
    function lengthOfLongestSubstring($s)
    {
        $n = strlen($s);
        $maxLength = 0;
        $start = 0;
        $charMap = [];

        for ($i = 0; $i < $n; $i++) {
            $currentChar = $s[$i];
            // If the current character is already in the substring,
            // move the start pointer to the next position after the repeated character
            if (isset($charMap[$currentChar]) && $start <= $charMap[$currentChar]) {
                $start = $charMap[$currentChar] + 1;
            }

            // Update the current character's position in the character map
            $charMap[$currentChar] = $i;

            // Update the maximum length if needed
            $maxLength = max($maxLength, $i - $start + 1);
        }

        return $maxLength;
    }
}

echo (new Solution())->lengthOfLongestSubstring('abcabcbb');