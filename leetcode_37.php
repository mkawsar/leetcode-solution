<?php

//Solving a Sudoku puzzle requires a backtracking approach, where you fill in digits one by one and backtrack if you encounter an invalid state
class SudokuSolver
{
    public function solveSudoku(&$board)
    {
        if ($this->solve($board)) {
            return $board;
        }
        return false; // No solution found
    }

    private function solve(&$board): bool
    {
        for ($row = 0; $row < 9; $row++) {
            for ($col = 0; $col < 9; $col++) {
                if ($board[$row][$col] == '.') {
                    for ($num = '1'; $num <= '9'; $num++) {
                        if ($this->isValid($board, $row, $col, $num)) {
                            $board[$row][$col] = (string)$num;
                            if ($this->solve($board)) {
                                return true; // Puzzle solved
                            }
                            $board[$row][$col] = '.'; // Backtrack
                        }
                    }
                    return false; // No valid number found
                }
            }
        }
        return true; // All cells are filled
    }

    private function isValid(&$board, $row, $col, $num): bool
    {
        // Check if the number is already in the row or column
        for ($i = 0; $i < 9; $i++) {
            if ($board[$row][$i] == $num || $board[$i][$col] == $num) {
                return false;
            }
        }

        // Check if the number is already in the 3x3 subgrid
        $startRow = $row - $row % 3;
        $startCol = $col - $col % 3;
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($board[$startRow + $i][$startCol + $j] == $num) {
                    return false;
                }
            }
        }
        return true; // The number is valid
    }
}

// Example usage
$board = [
    ["5", "3", ".", ".", "7", ".", ".", ".", "."],
    ["6", ".", ".", "1", "9", "5", ".", ".", "."],
    [".", "9", "8", ".", ".", ".", ".", "6", "."],
    ["8", ".", ".", ".", "6", ".", ".", ".", "3"],
    ["4", ".", ".", "8", ".", "3", ".", ".", "1"],
    ["7", ".", ".", ".", "2", ".", ".", ".", "6"],
    [".", "6", ".", ".", ".", ".", "2", "8", "."],
    [".", ".", ".", "4", "1", "9", ".", ".", "5"],
    [".", ".", ".", ".", "8", ".", ".", "7", "9"]
];

$solver = new SudokuSolver();
$solution = $solver->solveSudoku($board);

if ($solution) {
    echo "Sudoku Solved:\n";
    foreach ($solution as $row) {
        echo implode(' ', $row) . "\n";
    }
} else {
    echo "No solution found.\n";
}
