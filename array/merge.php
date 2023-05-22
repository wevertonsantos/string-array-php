<?php

$array1 = [
    'Weverton',
    'Lucas',
    'Maria',
    'Carlos',
];

$array2 = [
    'Patricia',
    'Leticia',
    'Luan',
];

$novoArray = array_merge($array1, $array2);

var_dump($novoArray);