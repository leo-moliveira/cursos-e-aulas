<?php
require('db_conf.php');

class ConexaoBanco extends PDO {

  private static $instance = null;

  public function __construct($dsn,$user,$pass,$op){
      parent::__construct($dsn,$user,$pass,$op);
  }

  public static function getInstance(){
    if(!isset(self::$instance)){
      $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);
      try{
        self::$instance = new ConexaoBanco("mysql:dbname=estqcontrole;host=localhost","root","",$opcoes);
      }catch(PDOException $e){
        echo "Erro ao conectar! ".$e;
      }
    }
    return self::$instance;
  }
}
/* ########################################################################################################################################################################## */

/* ############################################################# classe manipula usuario ############################################################# */
class UsuarioDB{
  private $conexao = null;

  public function __construct(){
    $this->conexao = ConexaoBanco::getInstance();
  }

  public function __destruct(){}

  public function verificaUsuario($usuario){
    try{
      $stat = $this->conexao->query("SELECT funcionarios.id,grupos.Nome AS 'Grupo',funcionarios.Login,funcionarios.Senha FROM funcionarios
                                      JOIN grupos ON (funcionarios.IdGrupo = grupos.id)
                                      WHERE funcionarios.Login='$usuario->Login' AND funcionarios.Senha='$usuario->Senha'");
      return $stat->FetchObject('Usuario');
    }catch (PDOException $exception) {
          echo 'Erro ao verificar usuário! '.$exception;
      }
    }
}
/* ########################################################################################################################################################################## */

/* ########################################### classe manipula produtos ####################################################################### */
class ProdutoDB{
    private $conexao = null;

    public function __construct(){
      $this->conexao = ConexaoBanco::getInstance();
    }

    public function __destruct(){}
/*Cadastrar produtos*/
  public function cadastra($produto){
        try {
            $stat = $this->conexao->prepare("INSERT INTO `produtos`(`id`, `Nome`, `idTipo`, `Valor`, `Vendas`, `EstqLoja`, `EstqMin`, `EstqEntrada`, `CodFornec`)
            VALUES (NULL,?,?,?,?,?,?,?,?)");
            $stat->bindValue(1,$produto->Nome);
            $stat->bindValue(2,$produto->Tipo);
            $stat->bindValue(3,$produto->Valor);
            $stat->bindValue(4,$produto->Vendas);
            $stat->bindValue(5,$produto->EstqLoja);
            $stat->bindValue(6,$produto->EstqMin);
            $stat->bindValue(7,$produto->EstqEntrada);
            $stat->bindValue(8,$produto->Fornecedor);
            $stat->execute();
            $this->conexao = null;
        } catch (PDOException $ex) {
            echo "Erro ao cadastrar usuário! ".$ex;
        }//Fecha catch

  }
/*Modifica cadastro dos produtos*/
  public function modificaProduto($produto){
    try {
        $stat = $this->conexao->prepare("UPDATE produtos SET Nome=?,
                                                              idTipo=(SELECT id FROM tipo WHERE nome LIKE ?),
                                                              Valor=?,
                                                              Vendas=?,
                                                              EstqLoja=?,
                                                              EstqMin=?,
                                                              EstqEntrada=?,
                                                              CodFornec=(SELECT id FROM fornecedores WHERE nome LIKE ?)
                                                              WHERE id=?");

        $stat->bindValue(1,$produto->Nome);
        $stat->bindValue(2,$produto->Tipo);
        $stat->bindValue(3,$produto->Valor);
        $stat->bindValue(4,$produto->Vendas);
        $stat->bindValue(5,$produto->EstqLoja);
        $stat->bindValue(6,$produto->EstqMin);
        $stat->bindValue(7,$produto->EstqEntrada);
        $stat->bindValue(8,$produto->Fornecedor);
        $stat->bindValue(9,$produto->id);
        $stat->execute();
        $this->conexao = null;
    } catch (PDOException $ex) {
        echo "Erro ao cadastrar usuário! ".$ex;
    }//Fecha catch
  }
/*Exluir um produto*/
  public function exluirProduto($produto){
    try {
        $stat = $this->conexao->prepare("DELETE FROM `produtos`
                                          WHERE id=$produto->id
                                          AND CodFornec=(SELECT id FROM fornecedores WHERE Nome like '$produto->Fornecedor')
                                          AND idTipo=(SELECT id FROM tipo WHERE nome like '$produto->Tipo')");
        $stat->execute();
        $this->conexao = null;
    } catch (PDOException $ex) {
        echo "Erro ao cadastrar usuário! ".$ex;
    }//Fecha catch
  }
/*Lista produtos*/
  public function listaProdutos(){
    try {
       $stat = $this->conexao->query("SELECT produtos.id, produtos.Nome,tipo.Nome AS 'Tipo',produtos.Valor,produtos.Vendas,produtos.EstqLoja,produtos.EstqMin,produtos.EstqEntrada,fornecedores.Nome AS 'Fornecedor'
                                      FROM produtos JOIN tipo ON produtos.idTipo=tipo.id
                                      JOIN fornecedores ON produtos.CodFornec=fornecedores.id");
       $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Produto');
       return $array;
     }catch(PDOException $pe){
       echo "Erro ao listar produtos!".$pe;
     }//Fecha catch

  }
/*Busca produtos*/
  public function buscaProduto($produto){
    $query="SELECT produtos.id, produtos.Nome,tipo.Nome AS 'Tipo',produtos.Vendas,produtos.EstqLoja,produtos.EstqMin,produtos.EstqEntrada,fornecedores.Nome AS 'Fornecedor'FROM produtos
                                   JOIN tipo ON produtos.idTipo=tipo.id
                                   JOIN fornecedores ON produtos.CodFornec=fornecedores.id
                                   WHERE produtos.Nome like '%$produto%'";
    try {
       $stat = $this->conexao->query("$query");
       $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Produto');
       return $array;
     }catch(PDOException $pe){
       echo "Erro ao buscar produto!".$pe;
     }//Fecha catch
   }

}
/* ########################################################################################################################################################################## */

/* ############################################################# Classe Manipula fornecedores ############################################################# */
class FornecedorDB{
    private $conexao = null;

    public function __construct(){
      $this->conexao = ConexaoBanco::getInstance();
    }

    public function __destruct(){}
/*Cadastrar fornecedor*/
    public function cadastra(){

    }
/*Alterar fornecedor e Cadastrar estoque mínimo*/
    public function modifica(){

    }
/*Inativar ou Ativar fornecedor*/
    public function alteraStatus(){

    }
/*Busca fornecedor por nome ou busca fornecedor por produto ou lista todos os fornecedores*/
    public function busca($busca,$par){
      $query = "SELECT * FROM fornecedores";
      if($busca == 1){
        $query = "SELECT fornecedores.* FROM produtos JOIN fornecedores
                  ON produtos.CodFornec=fornecedores.id
                  where produtos.Nome like '$par'";
      }else if ($busca == 2){
                              $query.= " where Nome like '$par'";
      }
      try {

         $stat = $this->conexao->query("$query");
         $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Fornecedor');
         return $array;
       }catch(PDOException $pe){
         echo "Erro ao buscar fornecedor!".$pe;
       }//Fecha catch
    }
}
/* ########################################################################################################################################################################## */

/* ############################################################# Classe Manipula vendas ############################################################# */
class VendaDB{

    private $conexao = null;

    public function __construct(){
      $this->conexao = ConexaoBanco::getInstance();
    }

    public function __destruct(){}

    public function listaVendas(){
      $query ="SELECT vendas.id, group_concat( COALESCE(NULL, produtos.Nome, 'None') SEPARATOR ' / ' )  as 'produto', vendas.status FROM vendas
                      LEFT JOIN vendaprodutos ON vendaprodutos.idVendas=vendas.id
                      LEFT JOIN produtos ON vendaprodutos.idProduto=produtos.id GROUP BY vendas.id";
    try {
         $stat = $this->conexao->query("$query");
         $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Venda');
         return $array;
       }catch(PDOException $pe){
         echo "Erro ao Listar vendas!".$pe;
       }//Fecha catch
    }

    public function buscaVenda($id){
      $query ="SELECT vendas.id, produtos.Nome as 'produto', vendas.status, vendaprodutos.quantidade FROM vendas
                LEFT JOIN vendaprodutos ON vendaprodutos.idVendas=vendas.id
                LEFT JOIN produtos ON vendaprodutos.idProduto=produtos.id WHERE vendas.id = $id";
      try {
         $stat = $this->conexao->query("$query");
         $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Venda');
         return $array;
       }catch(PDOException $pe){
         echo "Erro ao Listar vendas!".$pe;
       }//Fecha catch
    }

    public function cancelarVenda($v){
      try {
          $stat = $this->conexao->prepare("DELETE FROM vendaprodutos WHERE idvendas = $v");
          $stat->execute();
          $stat = $this->conexao->prepare("DELETE FROM `vendas` WHERE id = $v");
          $stat->execute();
          $this->conexao = null;
      } catch (PDOException $ex) {
          echo "Erro ao cadastrar usuário! ".$ex;
      }//Fecha catch
    }

    public function removeProduto($venda){
      try {
          $stat = $this->conexao->prepare("DELETE FROM vendaprodutos WHERE idVendas = $venda->id AND idProduto = (SELECT id FROM produtos WHERE nome like '$venda->produto') AND quantidade = $venda->quantidade");
          $stat->execute();
          $this->conexao = null;
      } catch (PDOException $ex) {
          echo "Erro ao cadastrar usuário! ".$ex;
      }//Fecha catch
    }

    public function adicionaProduto($venda){
      try {
          $stat = $this->conexao->prepare("INSERT INTO `vendaprodutos`(`idVendas`, `idProduto`, `quantidade`)
          VALUES (?,(SELECT id FROM produtos WHERE Nome like ?),?)");
          $stat->bindValue(1,$venda->id);
          $stat->bindValue(2,$venda->produto);
          $stat->bindValue(3,$venda->quantidade);
          $stat->execute();
          $this->conexao = null;
      } catch (PDOException $ex) {
          echo "Erro ao cadastrar usuário! ".$ex;
      }//Fecha catch
    }

    public function finalizaVenda($id){
      try {
          $stat = $this->conexao->prepare("UPDATE `vendas` SET `status`= 1 WHERE id = ?");
          $stat->bindValue(1,$id);
          $stat->execute();
          $stat = $this->conexao->prepare("UPDATE produtos
                                            INNER JOIN vendaprodutos
                                              ON produtos.id = vendaprodutos.idProduto
                                            SET
                                              produtos.vendas = produtos.vendas + vendaprodutos.quantidade,
                                              produtos.EstqLoja = produtos.EstqLoja - vendaprodutos.quantidade

                                            WHERE
                                              vendaprodutos.idVendas = $id");
          $stat->execute();
          $this->conexao = null;
      } catch (PDOException $ex) {
          echo "Erro ao cadastrar usuário! ".$ex;
      }//Fecha catch
    }

    public function excluiVenda($v){
      try {
        //printf($v); exit;
          $stat = $this->conexao->prepare("UPDATE produtos
                                            INNER JOIN vendaprodutos
                                              ON produtos.id = vendaprodutos.idProduto
                                            SET
                                              produtos.vendas = produtos.vendas - vendaprodutos.quantidade,
                                              produtos.EstqLoja = produtos.EstqLoja + vendaprodutos.quantidade
                                            WHERE
                                              vendaprodutos.idVendas = $v");
          $stat->execute();
          $stat = $this->conexao->prepare("DELETE FROM `vendaprodutos` WHERE idvendas = $v");
          $stat->execute();
          $stat = $this->conexao->prepare("DELETE FROM `vendas` WHERE id = $v");
          $stat->execute();
          $this->conexao = null;
      } catch (PDOException $ex) {
          echo "Erro ao cadastrar usuário! ".$ex;
      }//Fecha catch
    }

    public function incluiVenda(){
      try {
          $stat = $this->conexao->prepare("INSERT INTO `vendas`(`id`, `status`) VALUES (NULL,0)");
          $stat->execute();
          $stat = $this->conexao->query("SELECT AUTO_INCREMENT
                                          FROM   information_schema.tables
                                          WHERE  table_name = 'vendas'
                                          AND    table_schema = 'estqcontrole'");
          $id = $stat->fetch();
          $this->conexao = null;
      } catch (PDOException $ex) {
          echo "Erro ao cadastrar usuário! ".$ex;
      }//Fecha catch
      return $id;
    }

  }
/* ########################################################################################################################################################################## */
?>
