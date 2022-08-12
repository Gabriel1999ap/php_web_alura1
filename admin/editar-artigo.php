<?php 

require_once ('../config.php');
require_once ('../src/Artigo.php');
require_once('../src/redireciona.php');

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $artigo = new Artigo($mysql);
    $artigo->editar($_POST['id'],$_POST['titulo'],$_POST['conteudo']);

    redireciona('/blog/admin/index.php');
}

$artigo = new Artigo($mysql);
$art = $artigo->encontrarPorId($_GET['id']);


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body class="bodyAlura">
    <div id="containerAlura" class="form-group has-error">
        <h1 class="titleA">Editar Artigo</h1>
        <form action="editar-artigo.html" method="post">
            <p>
                <label for="titulo">Digite o novo título do artigo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $art['titulo']?>"
                placeholder="Titulo" >
            </p>
            <p>
                <label for="">Digite o novo conteúdo do artigo</label>
                <textarea class="form-control" id="titulo" name="conteudo" 
                placeholder="Digite o conteudo do artigo" 
                ><?php echo $art['conteudo']?></textarea>
            </p>
            <p>
                <input type="hidden" name="id" value="<?php echo $art['id']; ?>" />
            </p>
            <br>
            <nav>
                <a class="btn btn-success" href="./adicionar-artigo.php">Editar Artigo</a>
                <a class="btn btn-secondary" href="../admin/index.php">Voltar</a>
            </nav>
        </form>
    </div>
</body>

</html>