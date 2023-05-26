## Estudo sobre PHP(arrays e strings) com exercícios

### Tarefas com array

<ul>
  <h4>Início</h4>
  <li>Listar o número de países participantes</li>
  <li>Fazer com que seus nomes fiquem em letras maiúsculas</li>
  <h4>Ordenar:</h4>
  <li>Pelo país que tiver mais medalhas de ouro</li>
  <li>Em caso de empate, pelo país que tiver mais medalhas de prata</li>
  <li>Em caso de empate, pelo país que tiver mais medalhas de bronze</li>
  <h4>Por fim:</h4>
  <li>Listar o número de medalhas distribuídas na competição</li>
</ul>

### Lendo JSON

Pegando o arquivo em JSON e transformá-lo em algum dado que a gente possa manipular em PHP.
Felizmente isso é muito fácil e tudo que precisamos fazer é chamar uma função chamada json_decode.

Se nós adicionássemos um segundo atributo à função json_decode, poderíamos informar que ao invés de objetos do tipo stdClass nós gostaríamos de receber arrays associativos.
Então no código fica assim:

```
$json = file_get_contents('paises-medalhas.json');
$dados = json_decode($json, true);
```

### Função count

- Listar o número de países participantes;

Conta o número de itens em um array PHP:

```
$numeroDePaises = count($dados);
echo 'Número de paises participantes = ' . $numeroDePaises . PHP_EOL;
```
Resultado:
```
Número de paises participantes = 4
```


### Função array_map

- Fazer com que seus nomes fiquem em letras maiúsculas;

A função array_map tem como objetivo percorrer todo o array e mapear cada um dos itens processando-os com o que é pedido, e gerando um novo array com os novos valores.

```
$dados = array_map(function($dado){
  $dado['pais'] = mb_strtoupper($dado['pais']);
  return $dado;
}, $dados);
```
Resultado:
```
COSTA RICA
ESTADOS UNIDOS
TRINDADE E TOBAGO
BRASIL
```

### Função usort com regras de verificação:

Essa função irá ordenar um array pelos valores usando uma função de classificação definida pelo usuário.

- Pelo país que tiver mais medalhas de ouro
- Em caso de empate, pelo país que tiver mais medalhas de prata
- Em caso de empate, pelo país que tiver mais medalhas de bronze

```
function ordernarMedalhas(array $item1, array $item2) : int{
  $medalhas1 = $item1['medalhas'];
  $medalhas2 = $item2['medalhas'];

  return $medalhas2['ouro'] - $medalhas1['ouro'] !== 0 ?
         $medalhas2['ouro'] - $medalhas1['ouro'] :
         ($medalhas2['prata'] - $medalhas1['prata'] !== 0 ?
         $medalhas2['prata'] - $medalhas1['prata'] :
         $medalhas2['bronze'] - $medalhas2['bronze']);
}
```
Resultado:
```
COSTA RICA
ESTADOS UNIDOS
TRINDADE E TOBAGO
BRASIL
```

### Função array_reduce

A função array_reduce tem como objetivo reduzir o array a um único valor utilizando alguma operação aritmética para tal.

- Listar o número de medalhas distribuídas na competição

````
$totalMedalhas = array_reduce($dados, function ($total, $dado){
  $medalhas = $dado['medalhas'];
  
  $total += $medalhas['ouro'];
  $total += $medalhas['bronze'];
  $total += $medalhas['prata'];
  return $total;
}, 0);
````
Resultado:
````
Total medalhas = 47
````

### Função array_filter

Itera sobre cada valor de array passando-os para a função callback . Se a função callback retornar true, o valor atual de array é retornado no array resultante. 
