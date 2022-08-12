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

    public function adicionarArtigo(string $titulo, string $conteudo): void
    {
      $insereArtigo =  $this->mysql->prepare('INSERT INTO artigos (titulo,conteudo) VALUES (?,?);');
      //ss siginigica que vamos passar dois valors no INSERT INTO em forma de string
      //O método bind_param vincula o valor recebido pela variável $id para o ponto de interrogação da cláusula WHERE.
      $insereArtigo->bind_param('ss',$titulo, $conteudo);
      $insereArtigo ->execute();

    }

    public function exibirTodos(): array
    {

    // Realiza consulta no banco de dados
     $resultado =   $this-> mysql->query('SELECT id,titulo,conteudo FROM artigos');
     
     // O método fetch_all retorna um array associativo com valor inteiro
     $artigos  = $resultado -> fetch_all(MYSQLI_ASSOC);


        return $artigos;
    }
    
    // Realiza consulta no banco de dados pelo Id
    public function encontrarPorId(string $id): array
    {
 
      $selecionaArtigo = $this->mysql->prepare("SELECT id,titulo,conteudo FROM artigos WHERE id = ? ") ;
      //O método bind_param vincula o valor recebido pela variável $id para o ponto de interrogação da cláusula WHERE.
      $selecionaArtigo->bind_param('s',$id);
      $selecionaArtigo->execute();
      $artigo = $selecionaArtigo->get_result()->fetch_assoc();
      return $artigo;
     
    }

    //Deletando um artigo 

    public function remover(string $id): void
    {

      $removerArtigo =  $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');
      $removerArtigo->bind_param('s', $id);
      $removerArtigo ->execute();
      
    }

}

?>