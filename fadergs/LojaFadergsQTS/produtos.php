<?php
session_start();
ob_start();
include 'model/db_funcoes.php';
include 'control/lib.php';
include_once 'model/usuario.class.php';
include_once 'model/venda.class.php';
include_once 'model/produto.class.php';
?>
<!DOCTYPE html>
<html><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/v4-shims.css">
  <link rel="stylesheet" href="index.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body class="container">
<!--Barra nav-->

  <nav class="navbar navbar-expand-md bg-primary navbar-dark fixed-top">
    <?php if(isset($_SESSION['privateUser'])){
      $u = unserialize($_SESSION['privateUser']);?>
      <div class="container justify-content-end">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse text-center" id="navbar2SupportedContent">
          <a class="navbar-brand" href="index.php">Loja</a>
          <a class="navbar-brand" href="vendas.php">Vendas</a>
          <a class="navbar-brand" href="produtos.php">Produtos</a>
          <a class="navbar-brand" href="fornecedores.php">Fornecedores</a>
          <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
            <ul class="navbar-nav">
              <form id="deslogar" name="deslogar" action="" method="post">
                  <button type="submit" name="deslogar" class="btn navbar-btn btn-primary ml-2 text-white">
                    <i class="fas fa-sign-out-alt"> Sair</i>
                  </button>
              </form>
            </ul>
          </div>
        </div>
      </div>
  </nav>

<!--Corpo-->
<?php
if(isset($_POST['listarProdutos'])){
  unset($_POST);
  header("location:produtos.php");
}

if(isset($_POST['cadastrarProdutos'])){
  $uC = new Usuario;
  if(isset($_POST['fcadastrarProdutos'])){
    var_dump($_POST);exit;
  }else{
  if($u->Grupo == "Administrador"){
    $uC = $u;
  }else{
    $uC->Login = $_POST['inputLoginModal'];
    $uC->Senha = Seguranca::criptografar($_POST['inputPasswordModal']);
  }
  $uDB = new UsuarioDB();
  $usuario = $uDB->verificaUsuario($uC);
  if($usuario && !is_null($usuario) && $usuario->Grupo == "Administrador"){ ?>

  <button type="button" id="btmodalCadastroProduto" name="cadastrarProdutos" data-toggle="modal" data-target="#modalCadastroProduto" class="btn btn-primary text-white" hidden="hidden"><i class="fab fa-product-hunt"></i></button>
  <div class="modal fade" id="modalCadastroProduto" tabindex="-1" role="dialog" aria-labelledby="modalCadastroProduto" aria-hidden="true">
    <div class="modal-dialog" role="form">
      <div class="modal-content">
        <div class="modal-header">

          <h5 class="modal-title fas fa-times" id="cadastrarProdutosModal"> Cadastro de Produto!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="alert alert-info" role="alert"> Informe o produto a quantidade e o valor! </div>
              <form id="fcadastrarProdutos" action="" method="post">
                  <div class="form-group ">

                      <input type="text" class="form-control" id="inputProdutoModal" name="inputProdutoModal" placeholder="Produto">
                      <input type="text" class="form-control" id="inputProdutoModal" name="inputProdutoModal" placeholder="Tipo">
                      <input type="number" class="form-control" id="inputValorModal" name="inputValorModal" placeholder="Valor" min="000" max="10000.00" step="0.01" >
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="fcadastrarProdutos" id="btn-loginModal" value="fcadastrarProdutos" class="btn btn-primary ml-2 text-white"><i class="fas fa-sign-in-alt"> Cadastrar</i>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>$("#btmodalCadastroProduto").click(); </script>
  <?php }else{
  }}
  unset($_POST['cadastrarProdutos']);
}



if(isset($_POST['buscarProdutos'])){
  $prodDB = new ProdutoDB();
  $array = $prodDB->listaProdutos();
}else{
  $prodDB = new ProdutoDB();
  $array = $prodDB->listaProdutos();
}

?>
<div class="py-4">
  <div class="container py-4">
    <div class="jumbotron text-center">
      <p class="h3">Produtos</p>
        <div class="row py-2 ">
        <div class="col-md-3">
          <?php if($u->Grupo =="Administrador"){ ?>
            <form id="cadastrarProdutos" action="" method="post">
              <button type="submit" name="cadastrarProdutos" data-toggle="modal" data-target="" class="btn btn-primary text-white" valeu="cadastrarProdutos"><i class="fab fa-product-hunt"> Cadastrar Produto</i></button>
            </form> <?php }else{ ?>
              <button type="button" id="teste" name="cadastrarProdutos" data-toggle="modal" data-target="#cadastrarProdutosModal" class="btn btn-primary text-white"><i class="fab fa-product-hunt"> Cadastrar Produto</i></button>

              <div class="modal fade" id="cadastrarProdutosModal" tabindex="-1" role="dialog" aria-labelledby="cadastrarProdutosModal" aria-hidden="true">
                <div class="modal-dialog" role="form">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title fas fa-times" id="cadastrarProdutosModal"> Acesso Negado!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="alert alert-danger" role="alert"> Necessário ser administrador para  Cadastrar Produto! </div>
                          <form id="cadastrarProdutos" action="" method="post">
                              <div class="form-group ">
                                  <input type="text" class="form-control" id="inputLoginModal" name="inputLoginModal" placeholder="Login">
                              </div>
                              <div class="form-group">
                                  <input type="password" class="form-control" id="inputPasswordModal" name="inputPasswordModal" placeholder="Senha">
                              </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="cadastrarProdutos" id="btn-loginModal" value="cadastrarProdutos" class="btn btn-primary ml-2 text-white"><i class="fas fa-sign-in-alt"> Entrar</i>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php }?>
        </div>
        <div class="col-md-3">
          <form id="listarProdutos" action="" method="post">
            <button type="submit" name="listarProdutos" data-toggle="modal" data-target="" class="btn btn-primary text-white" value="listarProdutos"><i class="fab fa-product-hunt"> Listar Produtos</i></button>
          </form>
        </div>
        <div class="col-md-3">
          <form id="buscarProdutos" action="" method="post">
            <button type="submit" name="buscarProdutos" data-toggle="modal" data-target="" class="btn btn-primary text-white"><i class="fab fa-product-hunt"> Buscar Produto</i></button>
          </form>
        </div>
        <div class="table-responsive py-2">
          <table class="table table-striped">
            <thead>
              <th>Editar</th>
              <th>Nome</th>
              <th>Tipo</th>
              <th>Valor</th>
              <th>Vendas</th>
              <th>EstqLoja</th>
              <th>EstqMin</th>
              <th>EstqEntrada</th>
              <th>Fornecedor</th>
              <th class="text-center" >Ação</th>
            </thead>
            <tbody>
              <?php
              foreach($array as $a){?>
                <tr>
                  <th scope="row"><button type="button" name="" data-toggle="modal" data-target="" class="btn btn-primary text-white"><i class="fas fa-edit"> <?php printf("$a->id"); ?></i></button></th>
                    <td><?php printf ("$a->Nome"); ?></td>
                    <td><?php printf ("$a->Tipo"); ?></td>
                    <td><?php printf ("$a->Valor"); ?></td>
                    <td><?php printf ("$a->Vendas"); ?></td>
                    <td><?php printf ("$a->EstqLoja"); ?></td>
                    <td><?php printf ("$a->EstqMin"); ?></td>
                    <td><?php printf ("$a->EstqEntrada"); ?></td>
                    <td><?php printf ("$a->Fornecedor"); ?></td>
                    <td><button type="button" name="" data-toggle="modal" data-target="" class="btn btn-primary text-white"><i class="far fa-trash-alt"> Excluir</i></button></td>
                <?php } //fim foreach imprimi produtos?>
            </tbody>
          </table>
          </div>
      </div>
    </div>
  </div>
</div>
<?php
  if(isset($_POST['deslogar'])){
      unset($_SESSION['privateUser']);
      header("location:index.php");
    } //fim if testa usuario logado
    }else{
        header("location:index.php");
      }
?>


<!--Rodape-->
  <div class="py-3 footer">
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
