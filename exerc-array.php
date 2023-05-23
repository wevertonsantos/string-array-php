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

// Ordernar por paises que tiver mais medalhas de ouro

function ordernarMedalhasOuro(array $item1, array $item2) : int{
  return $item1['medalhas']['ouro'] <= $item2['medalhas']['ouro'];
}

usort($dados, 'ordernarMedalhasOuro');

foreach($dados as $paises){
  echo $paises['pais'] . ' ' . $paises['medalhas']['ouro'] . PHP_EOL;
}
