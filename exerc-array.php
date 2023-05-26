<?php

// Consumindo JSON

$json = file_get_contents('paises-medalhas.json');
$dados = json_decode($json, true);

// Listar o número de países participantes

$numeroDePaises = count($dados);
echo 'Número de paises participantes = ' . $numeroDePaises . PHP_EOL;

// Fazer com que seus nomes fiquem em letras maiúsculas

$dados = array_map(function($dado){
  $dado['pais'] = mb_strtoupper($dado['pais']);
  return $dado;
}, $dados);

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

var_dump($dados);

// Listar o número de medalhas distribuídas na competição

$totalMedalhas = array_reduce($dados, function ($total, $dado){
  $medalhas = $dado['medalhas'];
  
  $total += $medalhas['ouro'];
  $total += $medalhas['bronze'];
  $total += $medalhas['prata'];
  return $total;
}, 0);

var_dump("Total medalhas = $totalMedalhas");

// Filtando array para paises que não tem espaço

$paisesSemEspaco = array_filter($dados, function($dado){  
    return strpos($dado['pais'], ' ') == false;
});

print_r($paisesSemEspaco);