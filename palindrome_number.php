<?php

class Solution 
{
    function isPalindrome($x)
    {
        $numStr = (string)$x; // Convert the number to a string
        $reversedStr = strrev($numStr); // Reverse the string

        // Compare the original string with the reversed string
        if ($numStr === $reversedStr) {
            return true; // It's a palindrome
        } else {
            return false; // It's not a palindrome
        }
    }
}

$x = 121;

echo (new Solution())->isPalindrome($x);