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
            <a class="btn btn-success" href="./admin/index.php">Admin</a>
        </nav>
        <center><h1 class="titleA">-Meu Blog-</h1></center>
        
        <?php 
            foreach($artigos as $artigo) :?>
        <h2>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
            <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
            <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
        </svg>
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