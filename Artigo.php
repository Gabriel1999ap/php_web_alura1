<?php 

/* A finalidade desse arquivo que abriga a classe Artigos é de escrever o código PHP pe irá automatizar
a donstrução e edição de posts na pagina do blog e fazer a conexão com banco de dados
*/

class Artigo
{
    // Inicia a variável $mysql
    private $mysql;   

    // Cria a função construtora
    public function __construct(mysqli $mysql)
    {
        $this-> mysql = $mysql;
    }

    public function exibirTodos(): array
    {

    // Realiza consulta no banco de dados
     $resultado =   $this-> mysql->query('SELECT id,titulo,conteudo FROM artigos');
     
     // O método fetch_all retorna um array associativo com valor inteiro
     $artigos  = $resultado -> fetch_all(MYSQLI_ASSOC);


        return $artigos;
    }
}

?>