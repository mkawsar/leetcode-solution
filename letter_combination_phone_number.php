<?php

class LetterCombinationPhoneNumber
{
    // Given a string containing digits from 2-9 inclusive, return all possible letter combinations that the number could represent. Return the answer in any order.

    // A mapping of digits to letters (just like on the telephone buttons) is given below. Note that 1 does not map to any letters.
    function letterCombinations($digits)
    {
        if (empty($digits)) {
            return [];
        }

        $phoneMap = [
            '2' => ['a', 'b', 'c'],
            '3' => ['d', 'e', 'f'],
            '4' => ['g', 'h', 'i'],
            '5' => ['j', 'k', 'l'],
            '6' => ['m', 'n', 'o'],
            '7' => ['p', 'q', 'r', 's'],
            '8' => ['t', 'u', 'v'],
            '9' => ['w', 'x', 'y', 'z'],
        ];

        $combinations = [''];
        for ($i = 0; $i < strlen($digits); $i++) {
            $newCombinations = [];
            foreach ($combinations as $combination) {
                foreach ($phoneMap[$digits[$i]] as $item) {
                    $newCombinations[] = $combination . $item;
                }
                $combinations = $newCombinations;
            }
        }

        return $combinations;
    }
}

echo (new LetterCombinationPhoneNumber())->letterCombinations("23");
