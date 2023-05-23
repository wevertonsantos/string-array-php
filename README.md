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

Conta o número de itens em um array PHP:

```
$numeroDePaises = count($dados);
echo 'Número de paises participantes = ' . $numeroDePaises . PHP_EOL;
```
