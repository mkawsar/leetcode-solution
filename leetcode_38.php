<?php

class CountAndSay
{
    function countAndSay($n)
    {
        if ($n == 1) {
            return "1";
        }

        $prev = $this->countAndSay($n - 1);
        $curr = "";
        $count = 1;

        for ($i = 1; $i < strlen($prev); $i++) {
            if ($prev[$i] == $prev[$i - 1]) {
                $count++;
            } else {
                $curr .= $count . $prev[$i - 1];
                $count = 1;
            }
        }

        $curr .= $count . $prev[-1];
        return $curr;
    }
}
$solver = new CountAndSay();
$solution = $solver->countAndSay(4);

