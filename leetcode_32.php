<?php

// The "Longest Valid Parentheses" problem involves finding the length of the longest valid (well-formed) parentheses substring

class Solutions
{
    /**
     * @param String $s
     * @return Integer
     */
    function longestValidParentheses($s)
    {
        $maxLen = 0;
        $stack = [-1]; // Initialize stack with a sentinel value -1

        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == '(') {
                // Push the index of an open parenthesis onto the stack
                array_push($stack, $i);
            } else {
                // Pop the topmost element from the stack for a closing parenthesis
                array_pop($stack);
                if (empty($stack)) {
                    // If the stack is empty, push the current index onto the stack
                    array_push($stack, $i);
                } else {
                    // Calculate the length of the valid parentheses substring
                    $maxLen = max($maxLen, $i - end($stack));
                }
            }
        }
        return $maxLen;
    }
}

$input = "(()))())(";

echo(new Solutions())->longestValidParentheses($input);
