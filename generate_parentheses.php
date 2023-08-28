<?php

class GenerateParenthesis
{
    function parenthesis($n)
    {
        $result = [];
        $this->generate($result, '', 0, 0, $n);
        return $result;
    }

    function generate(&$result, $current, $open, $close, $max)
    {
        if (strlen($current) == $max * 2) {
            $result[] = $current;
            return;
        }

        if ($open < $max) {
            $this->generate($result, $current . '(', $open + 1, $close, $max);
        }

        if ($close < $open) {
            $this->generate($result, $current . ')', $open, $close + 1, $max);
        }
    }
}

$n = 3;

echo (new GenerateParenthesis())->parenthesis($n);