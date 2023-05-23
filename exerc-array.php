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

// Ordernar por paises que tiver mais medalhas

function ordernarMedalhas(array $item1, array $item2) : int{
  $medalhas1 = $item1['medalhas'];
  $medalhas2 = $item2['medalhas'];

  return $medalhas2['ouro'] - $medalhas1['ouro'] !== 0 ?
         $medalhas2['ouro'] - $medalhas1['ouro'] :
         ($medalhas2['prata'] - $medalhas1['prata'] !== 0 ?
         $medalhas2['prata'] - $medalhas1['prata'] :
         $medalhas2['bronze'] - $medalhas2['bronze']);
}

usort($dados, 'ordernarMedalhas');

foreach($dados as $paises){
  echo $paises['pais'] . PHP_EOL;
}
