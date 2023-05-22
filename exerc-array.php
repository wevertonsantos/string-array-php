<?php

// Consumindo JSON

$json = file_get_contents('paises-medalhas.json');
$dados = json_decode($json, true);

// Listar o número de países participantes

$numeroDePaises = count($dados);

echo 'Número de paises participantes = ' . $numeroDePaises . PHP_EOL;

// Fazer com que seus nomes fiquem em letras maiúsculas

foreach($dados as $nomePaises){
    echo mb_strtoupper($nomePaises['pais']) . PHP_EOL;
}
