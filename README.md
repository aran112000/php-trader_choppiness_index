# PHP trader_choppiness_index()
The PECL `trader` extension is great, however, at this moment it time, it doesn't have support for calculating a choppiness index score.

The Choppiness Index is designed to measure the market's trendiness (values below 20.00) versus the market's choppiness (values above 60.00). When the indicator is reading values near 100, the market is considered to be in choppy consolidation. The lower the value of the Choppiness Index, the more the market is trending. The period supplied by the user dictates how many bars are used to compute the index.

## Requirements
 * PHP 5.4+
 * PECL trader >= 0.2.0 - See http://php.net/manual/en/trader.installation.php for installation instructions

## Example
```PHP
<?php
// Load our class
require('choppiness_index.php');

// Sample dataset
$data = [
    [
        'high' => 1.09437,
        'low' => 1.09017,
        'close' => 1.09313,
    ],
    [
        'high' => 1.09372,
        'low' => 1.08528,
        'close' => 1.08632,
    ],
    [
        'high' => 1.09463,
        'low' => 1.07811,
        'close' => 1.08272,
    ],
    [
        'high' => 1.08388,
        'low' => 1.07106,
        'close' => 1.07481,
    ],
    [
        'high' => 1.07994,
        'low' => 1.07115,
        'close' => 1.07797,
    ],
];

$dataset = [];
foreach ($data as $row) {
    $class = new stdClass();
    $class->high = $row['high'];
    $class->low = $row['low'];
    $class->close = $row['close'];

    $dataset[] = $class;
}

$choppiness_index = new choppiness_index();
$result = $choppiness_index->get($dataset, 4);

echo 'Current Choppiness Index score: ' . $result;
```
