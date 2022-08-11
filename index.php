<?php

/* ------------------------------------ Separando os códigos PHP do HTML --------------------------------------- */

/*É boa prática de programação manter os códigos em arquivos separados, para facilitar a edição de códigos e também
evitar possíveis erros possam danificar a aplicação.

Nesse exercício isolamos os códigos PHP dos artigos em uma classe e encapsulamos esse código em uma função,
para acessar essa classe e a função criada é necessário serguir os procedimentos a seguir:*/

// Fazer o link com o código feito na classe Artigos, utilixando o require.


require_once ('./src/Artigo.php');

// Instanciando a conexão, feita no arquivo config.php
require_once('./config.php');


// Instanciar a classe Artigos, criando a classe e salvando ele em uma variável, nesse caso usamos $artigo
$artigo = new Artigo($mysql);

/* Referenciar a função exibirArtigos(), salvando a função dentro da variável $artigos,
que recebeu o valor da classe Artigos salvo na variável $artigo */
$artigos = $artigo -> exibirTodos();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body class="bodyAlura">
    <div id="containerAlura">
        <nav>
            <a class="btn btn-success" href="./admin/index.html">Admin</a>
        </nav>
        <center><h1 class="titleA">Meu Blog</h1></center>
        
        <?php 
            foreach($artigos as $artigo) :?>
        <h2>
            <a class="link" href="artigo.php?id=<?php echo $artigo['id']; ?>">
                <?php 
                    echo $artigo['titulo']
                ?>
            </a>
        </h2>
        <p>
            <?php echo $artigo['conteudo'] ?> 
        </p>
        <?php 
           endforeach
        ?>
    </div>
</body>

</html>