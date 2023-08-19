<?php

class ValidParentheses
{
    function isVailed($s)
    {
        $stack = [];
        $mapping = [
            ')' => '(',
            '}' => '{',
            ']' => '['
        ];

        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];

            if (array_key_exists($char, $mapping)) {
                $topElement = array_pop($stack);
                if ($topElement != $mapping[$char]) {
                    return false;
                }
            } else {
                array_push($stack, $char);
            }
        }

        return empty($stack);
    }
}

$string = "()";

echo (new ValidParentheses())->isVailed($string);
