<?php 

require_once   ('config.php');
require_once ('./src/Artigo.php');

$obj_artigo = new Artigo($mysql);
$artigo =  $obj_artigo->encontrarPorId($_GET['id']);

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
        <h1 class="titleA">
            <?php echo $artigo['titulo'] ?>
        </h1>
        <p>
        <?php echo nl2br($artigo['conteudo']) ?>
        </p>
        <div>
            <a class="btn btn-secondary" href="index.php">Voltar</a>
        </div>
    </div>
</body>

</html>