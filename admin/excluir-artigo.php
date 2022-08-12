<?php 

require_once ('../config.php');
require_once ('../src/Artigo.php');
require_once('../src/redireciona.php');



if($_SERVER['REQUEST_METHOD'] === 'POST'){

$artigo = new Artigo($mysql);
$artigo -> remover($_POST['id']);



redireciona('/blog/admin/index.php');

}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="UTF-8">
    <title>Excluir Artigo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body class="bodyAlura">
    <div id="containerAlura">
        <h1 class="titleA">Você realmente deseja excluir o artigo?</h1>

        <br>
        <?php ?>
        <br>
        <form method="post" action="excluir-artigo.php">
            <p>
                <input type="hidden" name="id" value=" <?php echo $_GET['id'] ?>" />
                <button class="btn btn-danger">Excluir</button>
                <a class="btn btn-secondary" href="./index.php" >Voltar</a>
            </p>
        </form>
    </div>
</body>

</html>