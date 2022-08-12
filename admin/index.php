<?php

require_once('../config.php');
require_once('../src/Artigo.php');


$artigo = new Artigo($mysql);
$artigos = $artigo -> exibirTodos();

?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Página administrativa</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    
</head>

<body class="bodyAlura">
    <div id="containerAlura">
        <h1 class="titleA">Página Administrativa</h1>
        <?php foreach($artigos as $art) : ?>

        
        <div>
            <div id="artigo-admin">
                <p> <?php echo $art['titulo']; ?></p>
                <nav>
                <a class="btn btn-warning" href="./editar-artigo.php?id=<?php echo $art['id']; ?> " >Editar</a>
                <a class="btn btn-danger" href="./excluir-artigo.php?id=<?php echo $art ['id']; ?>">Excluir</a>
                </nav>
            </div>

            <?php endforeach ?>
        
           
        <br>
        <nav>
            <a class="btn btn-success" href="./adicionar-artigo.php">Adicionar Artigo</a>
            <a class="btn btn-secondary" href="../index.php">Voltar</a>
        </nav>
    </div>
</body>

</html>