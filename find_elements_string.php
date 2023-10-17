<?php

class Solutions
{
    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr($haystack, $needle) {
        $pos = strpos($haystack, $needle);
        if ($pos !== false) {
            return $pos;
        } else {
            return -1;
        }
    }
}

$haystack = 'sadbutsad';
$needle = 'sad';

echo (new Solutions())->strStr($haystack, $needle);
