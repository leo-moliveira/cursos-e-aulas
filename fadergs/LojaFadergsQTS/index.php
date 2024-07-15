<?php
session_start();
ob_start();
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
      include_once 'model/usuario.class.php';
      $u = unserialize($_SESSION['privateUser']);
      ?>
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
      <?php
    }?>
  </nav>

<!--Corpo-->
<div  class="py-4">
  <?php
  if(isset($_SESSION['privateUser'])){
          include_once 'model/usuario.class.php';
          $u = unserialize($_SESSION['privateUser']);
  ?>
  <div class="container py-4">
      <div class="jumbotron text-center">
        <p class="h1">Olá <?php echo "$u->Login" ?>, seja bem vindo(a) a Loja!</p>
      </div>
    </div>
  <?php
      if(isset($_POST['deslogar'])){
          unset($_SESSION['privateUser']);
          header("location:index.php");
        }
  }else{
    ?>
    <div class="py-4 container">
      <div class="row">
      <div class="col-sm-2 ml-2 mr-4">
        <img src="img/loja.jpg" class="img-fluid" style="height: 100%; width: 100%; display: block;" alt="Loja">
      </div>
    <div class="col-sm-6 ml-4 mr-4 text-center">
          <div>
            <h2 >Seja bem vindo!!</h2>
            <p>Para acessar favor entrar com seu login e senha!</p>

            <?php if(isset($_POST['Entrar'])){ ?>
              <div class="alert alert-danger" role="alert"> Usuário ou senha invalidos!! </div>
            <?php } ?>


          </div>
          <div>
          <form id="Login" action="" method="post">
              <div class="form-group ">
                  <input type="int" class="form-control" id="inputLogin" name="inputLogin" placeholder="Login">
              </div>
              <div class="form-group">
                  <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Senha">
              </div>
              <button type="submit" name="Entrar" id="btn-login" value="Entrar" class="btn navbar-btn btn-primary ml-2 text-white"><i class="fas fa-sign-in-alt"> Entrar</i>

          </form>
          <div>
        </div>
      </div>
    </div>
        <?php
      }
      if(isset($_POST['Entrar'])){
        include_once 'model/usuario.class.php';
        include 'model/db_funcoes.php';
        include 'control/lib.php';

        $Login = $_POST['inputLogin'];
        $Senha = Seguranca::criptografar($_POST['inputPassword']);

        $u = new Usuario();
        $u->Login = $Login;
        $u->Senha = $Senha;

        $uDB = new UsuarioDB();
        $usuario = $uDB->verificaUsuario($u);

        if($usuario && !is_null($usuario)){
          $_SESSION['privateUser'] = serialize($usuario);
          header("location:index.php");
        }else{

        }
      }
       ?>
</div>

<!--Rodape-->
  <div class="py-3 footer">
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
