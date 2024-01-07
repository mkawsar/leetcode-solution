<?php

class Solutions
{
    /**
     * To check whether a given 9x9 Sudoku board is valid, you can use the following PHP function.
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board)
    {
        // Check each row
        for ($i = 0; $i < 9; $i++) {
            if (!$this->isValidUnit($board[$i])) {
                return false;
            }
        }
    
        // Check each column
        for ($j = 0; $j < 9; $j++) {
            $column = array_column($board, $j);
            if (!$this->isValidUnit($column)) {
                return false;
            }
        }
    
        // Check each 3x3 subgrid
        for ($i = 0; $i < 9; $i += 3) {
            for ($j = 0; $j < 9; $j += 3) {
                $subgrid = array_merge(
                    array_slice($board[$i], $j, 3),
                    array_slice($board[$i + 1], $j, 3),
                    array_slice($board[$i + 2], $j, 3)
                );
    
                if (!$this->isValidUnit($subgrid)) {
                    return false;
                }
            }
        }
    
        return true;
    }
    

    function isValidUnit($unit) {
        $seen = [];
        foreach ($unit as $value) {
            if ($value != '.') {
                if (isset($seen[$value])) {
                    return false; // Duplicated value
                }
                $seen[$value] = true;
            }
        }
        return true;
    }
}

$board = [
    ["5","3",".",".","7",".",".",".","."],
    ["6",".",".","1","9","5",".",".","."],
    [".","9","8",".",".",".",".","6","."],
    ["8",".",".",".","6",".",".",".","3"],
    ["4",".",".","8",".","3",".",".","1"],
    ["7",".",".",".","2",".",".",".","6"],
    [".","6",".",".",".",".","2","8","."],
    [".",".",".","4","1","9",".",".","5"],
    [".",".",".",".","8",".",".","7","9"]
];

$obj = new Solutions();
$result = $obj->isValidSudoku($board);
echo $result ? "Valid Sudoku" : "Invalid Sudoku";
