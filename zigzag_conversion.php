<?php

class ZigzagConversion
{
    function coversation($s, $numRows) {
        if ($numRows === 1 || strlen($s) <= $numRows) {
            return $s;
        }

        $rows = array_fill(0, $numRows, ''); // Initialize an array to store each row
        $rowIndex = 0;
        $step = 1;

        for ($i = 0; $i < strlen($s); $i++) {
            $rows[$rowIndex] .= $s[$i]; // Add the current character to the current row

            // Adjust the row index and step size
            if ($rowIndex === 0) {
                $step = 1; // Move down to the next row
            } elseif ($rowIndex === $numRows - 1) {
                $step = -1; // Move up to the previous row
            }

            $rowIndex += $step;
        }
        $result = implode('', $rows); // Combine all rows into a single string
        return $result;
    }
}

$string = 'PAYPALISHIRING';
$numRows = 4;

echo (new ZigzagConversion())->coversation($string, $numRows);