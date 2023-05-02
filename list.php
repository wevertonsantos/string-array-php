<?php

$dados = [
    'nome' => 'Weverton',
    'nota' => 10,
    'idade' => 20
];

['nome' => $nome, 'nota' => $nota, 'idade' => $idade] = $dados;

var_dump($nome, $nota, $idade);