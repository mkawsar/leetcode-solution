<?php

class ReverseInteger
{
    function resverse($x) 
    {
        $isNegative = $x < 0; // Check if the number is negative
        $x = abs($x); // Convert to positive number for reversal

        $reversed = 0;
        while ($x > 0) {
            $lastDigit = $x % 10; // Extract the last digit
            $reversed = $reversed * 10 + $lastDigit; // Add the digit to the reversed number
            $x = (int)($x / 10); // Remove the last digit
        }

        if ($isNegative) {
            $reversed = -$reversed; // Restore the negative sign
        }

        // Check if the reversed number is within the 32-bit integer range
        if ($reversed < -pow(2, 31) || $reversed > pow(2, 31) - 1) {
            return 0; // Return 0 if the reversed number is out of range
        }

        return $reversed;
    }
}

$x = 123;
echo (new ReverseInteger())->resverse($x);