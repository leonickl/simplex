<?php

require_once 'vendor/autoload.php';

// maximise z = 300 * x1 + 200 * x2 - 50000
// under the following constraints:
//   I) x1 + 2 * x2 + y1 = 1000
//  II) 25 * x1 + 10 * x2 + y2 = 10000
// III) x1 + y3 = 700
//  IV) x2 + y4 = 500
//   V) x, y >= 0 (non-negativity constraint)

// Build the Simplex-Tableau and insert as a two-dimensional array in below.
// As a second parameter to the constructor, pass the number of variables that
// have to be evaluated in the solution (e. g. 2 for only x and 6 for also y).
// The third parameter is an optional boolean that indicated
// if the solution should be shown step by step.

$solutions = (new Leo\Simplex\Simplex([
    [ 1,  2, 1, 0, 0, 0,  1000],      // constraint   I
    [25, 10, 0, 1, 0, 0, 10000],      // constraint  II
    [ 1,  0, 0, 0, 1, 0,   700],      // constraint III
    [ 0,  1, 0, 0, 0, 1,   500],      // constraint  IV
    
    [-300, -200, 0, 0, 0, 1, -50000], // function to maximise
], 3, true))->run()->solutions();

echo json_encode($solutions), PHP_EOL;
