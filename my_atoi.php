<?php

class myAtoi
{
    function myAtoi($s) {
        $s = trim($s); // Remove leading and trailing whitespace
        $sign = 1; // Sign of the number, 1 for positive, -1 for negative
        $result = 0;
        $i = 0;

        // Check if the number is negative or positive
        if ($s[$i] === '-' || $s[$i] === '+') {
            $sign = $s[$i] === '-' ? -1 : 1;
            $i++;
        }

        // Convert digits to integer until a non-digit character is encountered
        while ($i < strlen($s) && is_numeric($s[$i])) {
            $result = $result * 10 + (int)($s[$i]);
            $i++;
        }

        $result = $result * $sign; // Apply the sign

        // Handle integer overflow/underflow cases
        $maxInt = pow(2, 31) - 1;
        $minInt = -pow(2, 31);

        if ($result > $maxInt) {
            $result = $maxInt;
        } elseif ($result < $minInt) {
            $result = $minInt;
        }

        return $result;
    }
}

$str = "42";

echo (new myAtoi())->myAtoi($str);