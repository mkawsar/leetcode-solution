<?php

// Substring with Concatenation of All Words

class Solutions
{
    /**
     * @param String $s
     * @param String[] $words
     * @return Integer[]
    */

    function findSubstring($s, $words)
    {
        $result =  [];

        $wordCount = count($words);
        $wordLength = strlen($words[0]);
        $totalLength = $wordCount * $wordLength;

        if ($totalLength > strlen($s)) {
            return $result;
        }

        $wordMap = array_count_values($words);

        for ($i =0; $i <= strlen($s) - $totalLength; $i++) {
            $substring = substr($s, $i, $totalLength);
            $wordsFound = [];

            for ($j = 0; $j < $totalLength; $j += $wordLength) {
                $word = substr($substring, $j, $wordLength);

                if (isset($wordMap[$word])) {
                    $wordsFound[$word]++;

                    if ($wordsFound[$word] > $wordMap[$word]) {
                        break;
                    }
                } else {
                    break;
                }
            }

            if ($wordsFound == $wordMap) {
                $result[] = $i;
            }
        }

        return $result;
    }
}

$s = "barfoothefoobarman";
$words = ["foo", "bar"];
$obj = new Solutions();
$result = $obj->findSubstring($s, $words);

foreach ($result as $index => $value) {
    echo "Substring starting at index $index: " . substr($s, $index, strlen(implode("", $words))) . "\n";
}
