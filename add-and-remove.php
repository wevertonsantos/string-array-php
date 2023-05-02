<?php

$array1 = [
    1,
    2,
    3
];

array_push($array1, 4, 5);

echo array_unshift($array1, 10) . PHP_EOL;
echo array_shift($array1) . PHP_EOL;
echo array_pop($array1) . PHP_EOL;

var_dump($array1);