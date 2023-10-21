<?php


class Solution 
{
    function findMedianSortedArrays($nums1, $nums2)
    {
        // Merge the two array
        $merged = array_merge($nums1, $nums2);

        sort($merged);

        $count = count($merged);
        $mid = $count / 2;

        if ($count % 2 == 0) {
            // Even number of elements, average the middle two
            $median = ($merged[$mid - 1] + $merged[$mid]) / 2;
        } else {
            // Odd number of elements, return the middle element
            $median = $merged[floor($mid)];
        }

        return $median;
    }
}


echo (new Solution())->findMedianSortedArrays([1, 3], [2, 4]);
