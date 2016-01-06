<?php
require('choppiness_index.php');
$choppiness_index = new choppiness_index();

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

// $dataset should be ordered oldest to newest
$result = $choppiness_index->get($dataset, $period = 4);

echo 'Current Choppiness Index score: ' . $result;
