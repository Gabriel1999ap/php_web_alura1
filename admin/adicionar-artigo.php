<?php 

require_once('../config.php');
require_once('../src/Artigo.php');
require_once('../src/redireciona.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
 
$artigo = new Artigo($mysql);
$artigo->adicionarArtigo($_POST['titulo'], $_POST['conteudo']);


redireciona('/blog/admin/index.php');

}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="UTF-8">
    <title>Adicionar Artigo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body class="bodyAlura">

    <div id="containerAlura" class="form-group has-error">
        <h1 class="titleA">Adicionar Artigo</h1>
        <form action="adicionar-artigo.php" method="post">
            <p>
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" 
                placeholder="Titulo" >
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo</label>
                <textarea class="form-control" type='text' id="conteudo" name="conteudo" 
                placeholder="Digite o conteudo do artigo" 
                ></textarea>
            </p>
            <nav>
            <div id="liveAlertPlaceholder"></div>
                <button class="btn btn-success">Criar Artigo</button>
                <a class="btn btn-secondary" href="../admin/index.php">Voltar</a>
            </nav>
      
    
        </form>
    </div>
</body>

</html>