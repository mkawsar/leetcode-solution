<?php


class Solution {
    function twoSum($nums, $target) {

        $set = array_flip($nums);
        foreach($nums as $i => $n) {
            if (array_key_exists($target - $n, $set) && $set[$target - $n] != $i) {
                return [$i, $set[$target - $n]];
            }
        }
    }
}

$obj = new Solution;
$obj->twoSum([2,7,11,15], 9);
 