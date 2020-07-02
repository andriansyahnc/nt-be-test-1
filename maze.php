<?php


class Maze {

    /**
     * This maze input.
     * 
     * int $size
     */
    private int $size;

    /**
     * This maze parameter to shows where should the path in the wall is.
     * 
     * int $left
     */
    private bool $left;

    /**
     * Maze construction.
     */
    public function __construct(int $size)
    {
        $this->size = $size;
        $this->left = TRUE;
    }

    /**
     * Check whether the combination of row and column is a Path.
     */
    private function isPath($row, $column): bool {
        if ($row % 2 != 0 && ($column > 0 && $column < $this->size-1)) {
            return TRUE;
        } else {
            if (!$this->left && $column == $this->size-2) {
                return TRUE;
            } elseif ($this->left && $column == 1) {
                return TRUE;
            }
        }
        return FALSE;
    }

    /**
     * Function to validate the input.
     */
    private function validate() {
        if (($this->size + 1) / 4 < 1) {
            return FALSE;
        } elseif (($this->size + 1) % 4 > 0) {
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Function to build the maze.
     */
    public function build(): void {
        if (!$this->validate()) {
            print("Could'nt generate the maze with input {$this->size}");
            return;
        }
        for ($row = 0; $row < $this->size; $row++) {
            for ($column = 0; $column < $this->size; $column++) {
                if ($this->isPath($row, $column)) {
                    print(" ");
                }
                else {
                    print("@");
                }
            }
            if ($row % 2 > 0) {
                $this->left = !$this->left;
            }
            print("\n");
        }
    }
}

$maze = new Maze(15);
$maze->build();