<?php

class Solution
{
    function romanToInteger($s)
    {
        $romanNumerals = [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000,
        ];

        $num = 0;

        for ($i = 0; $i < strlen($s); $i++) {
            $currentValue = $romanNumerals[$s[$i]];
            $nextValue = $romanNumerals[$s[$i + 1]] ?? 0;

            if ($currentValue < $nextValue) {
                $num -= $currentValue;
            } else {
                $num += $currentValue;
            }
        }

        return $num;
    }
}

echo (new Solution())->romanToInteger('MMMDXLIX');