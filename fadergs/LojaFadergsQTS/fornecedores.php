<?php
session_start();
ob_start();
include 'model/db_funcoes.php';
include 'control/lib.php';
include_once 'model/usuario.class.php';
include_once 'model/venda.class.php';
include_once 'model/fornecedor.class.php';
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
if(isset($_POST['listarFornecedores'])){
  unset($_POST);
  header("location:fornecedores.php");
}

if(isset($_POST['cadastrarFornecedores'])){
}

if(isset($_POST['buscarFornecedores'])){
  $fornecDB= new FornecedorDB();
  $array = $fornecDB->busca(NULL,NULL);
}else{
  $fornecDB= new FornecedorDB();
  $array = $fornecDB->busca(NULL,NULL);
}
 ?>
<div class="py-4">
  <div class="container py-4">
    <div class="jumbotron text-center">
      <p class="h3">Fornecedores</p>
        <div class="row py-2 ">
        <div class="col-md-3">
          <form id="cadastrarFornecedores" action="" method="post">
            <button type="submit" name="" data-toggle="modal" data-target="" class="btn btn-primary text-white"><i class="fas fa-building"> Cadastrar Fornecedor</i></button>
          </form>
        </div>
        <div class="col-md-3">
          <form id="listarFornecedores" action="" method="post">
            <button type="submit" name="listarFornecedores" data-toggle="modal" data-target="" class="btn btn-primary text-white"><i class="fas fa-building" value="listarFornecedores"> Listar Fornecedores</i></button>
          </form>
        </div>
        <div class="col-md-3">
          <form id="buscarFornecedores" action="" method="post">
            <button type="submit" name="buscarFornecedores" data-toggle="modal" data-target="" class="btn btn-primary text-white"><i class="fas fa-building" value="buscarFornecedores"> Buscar Fornecedor</i></button>
          </form>
        </div>
        <div class="table-responsive py-2">
          <table class="table table-striped">
            <thead>
              <th>Editar</th>
              <th>Nome</th>
              <th>CNPJ</th>
              <th>Endereco</th>
              <th>Email</th>
              <th>Estado</th>
              <th class="text-center" >Ação</th>
            </thead>
            <tbody>
              <?php
              foreach($array as $a){?>
                <tr>
                  <th scope="row"><button type="button" name="" data-toggle="modal" data-target="" class="btn btn-primary text-white"><i class="fas fa-pen-nib"> <br><?php printf("$a->id"); ?></i></button></th>
                    <td><?php printf ("$a->Nome"); ?></td>
                    <td><?php printf ("$a->CNPJ"); ?></td>
                    <td><?php printf ("$a->Endereco"); ?></td>
                    <td><?php printf ("$a->Email"); ?></td>
                    <td><?php printf ("$a->Estado"); ?></td>

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
