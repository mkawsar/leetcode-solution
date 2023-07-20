<?php

class Solution
{
    function longestCommonPrefix($strs)
    {
        if (empty($strs)) {
            return '';
        }

        $commonPrefix = $strs[0];

        for ($i = 1; $i < count($strs); $i++) {
            $j = 0;


            while ($j < strlen($commonPrefix) && $j < strlen($strs[$i]) && $commonPrefix[$j] === $strs[$i][$j]) {
                $j++;
            }

            $commonPrefix = substr($commonPrefix, 0, $j);
        }

        return $commonPrefix;
    }
}

$strings = ["flower", "flow", "flight"];
echo (new Solution())->longestCommonPrefix($strings);
