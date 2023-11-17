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
  if(isset($_SESSION['privateUser'])){ //inicio if testa usuario logado
          $u = unserialize($_SESSION['privateUser']);
          $vendasDB = new VendaDB;
          $array = $vendasDB->listaVendas();
          ?>
  <div class="container py-4">
    <?php
    if(isset($_POST['cancelarVenda'])){       //inicio teste para modal efetuado cancelar venda
      $idVenda = $_POST['inputVendaID'];
      if($u->Grupo == 'Administrador'){
      }else{
        $Login = $_POST['inputLoginModal'];
        $Senha = Seguranca::criptografar($_POST['inputPasswordModal']);

        $u->Login = $Login;
        $u->Senha = $Senha;
      }
      $uDB = new UsuarioDB();
      $usuario = $uDB->verificaUsuario($u);

      if($usuario && !is_null($usuario) && $usuario->Grupo == "Administrador"){ //inicio if cancelamento
        $v = new VendaDB();
        $v->cancelarVenda($idVenda);
        ?>
        <script>javascript:alert('Venda Cancelada!');</script>
        <?php
      }else { //else cancelamento, erro ou login incorreto
        ?>
        <script>javascript:alert('Usuário ou senha incorretos ou você não tem permissão para executar esta ação, Venda não será cancela!');</script>
      <?php }
        unset($_POST['loginModal']);
        unset($_POST['retomaVenda']);
        ?>
        <script type="text/javascript">window.location.href = 'vendas.php';</script>
        <?php

    }
    if(isset($_POST['exluirVenda'])){ //inicio if testa POST exlusão
      $exV = $_POST['inputVendaID'];
      if($u->Grupo=='Administrador'){ //inicio if exlusão testa usuario admin
      }else{ //fim if exlusão e pega modal caso não seja admin
        $Login = $_POST['inputLoginModal'];
        $Senha = Seguranca::criptografar($_POST['inputPasswordModal']);

        $u->Login = $Login;
        $u->Senha = $Senha;
      } //fim else exclusao
      $uDB = new UsuarioDB();
      $usuario = $uDB->verificaUsuario($u);
          if($usuario && !is_null($usuario) && $usuario->Grupo == "Administrador"){ //inicio teste para excluir
            $exVenda = new VendaDB();
            $exVenda->excluiVenda($exV);
            ?>
            <script>javascript:alert('Venda Excluida!');</script>
            <?php
          }else { //fim teste para excluir inicio else caso erro ou usuario errado ?>
            <script>javascript:alert('Usuário ou senha incorretos ou você não tem permissão para executar esta ação, veda não será excluida!');</script>
          <?php } //fim else caso erro ou usuario errado
            unset($_POST['exluirVendaModal']);
            ?>
            <script type="text/javascript">window.location.href = 'vendas.php';</script>
            <?php
    } //fim if testa POST exlusão

    if(isset($_POST['addVenda'])){ //inicio if testa
      $venda = new VendaDB;

      $venda= $venda->incluiVenda();
      $_POST['inputVendaID'] = $venda['AUTO_INCREMENT'] - 1;
      } //fim if testa POST exlusão
    ?>
    <div class="jumbotron text-center">
      <?php if(isset($_POST['retomaVenda'])){ //inicio if testa retomar venda pendente
        $venda = new Venda;
        $venda->id = $_POST['inputVendaID'];
        $vendasDB = new VendaDB;
          if(isset($_POST['removeProduto'])){
            $venda->produto = $_POST['inputProdutoNome'];
            $venda->status = $_POST['inputProdutoStatus'];
            $venda->quantidade = $_POST['inputProdutoQuantidade'];

            if($u->Grupo == "Operador"){
              $Login = $_POST['inputLoginModal'];
              $Senha = Seguranca::criptografar($_POST['inputPasswordModal']);
              $uTeste = new Usuario();
              $uTeste->Login = $Login;
              $uTeste->Senha = $Senha;
              $uDB = new UsuarioDB();
              $usuario = $uDB->verificaUsuario($uTeste);
              if($usuario && !is_null($usuario) && $usuario->Grupo == "Administrador"){
                $vendasDB->removeProduto($venda);
                ?>
                <script>javascript:alert('Produto Removido!');</script>
                <?php
              }else{?>
                <script>javascript:alert('Usuário ou senha incorreta, Produto não removido!');</script>
                <?php
              }
            }else{
              $vendasDB->removeProduto($venda);
              ?>
              <script>javascript:alert('Produto Removido!');</script>
              <?php
            }
          }

          if(isset($_POST['addProdutoModal'])){
            $v = new Venda;
            $v->id = $_POST['inputVendaID'];
            $v->produto = $_POST['inputPordutoModal'];
            $v->quantidade = $_POST['inputQuantidadeModal'];
            $v->status = 0;
            $vendasDB = new VendaDB;
            $vendasDB->adicionaProduto($v);
          }

          if(isset($_POST['finalizaVenda'])){
            $finaliza = new VendaDB;

            $finaliza->finalizaVenda($_POST['inputVendaID']);
            unset($_POST['retomaVenda']);
            unset($_POST['finalizaVenda']);

            ?>
            <script type="text/javascript">javascript:alert('Venda Finaliza!');</script>
            <script type="text/javascript">window.location.href = 'vendas.php';</script>
            <?php

          }

            if(isset($_POST['VOLTAR'])){
              ?>
              <script type="text/javascript">window.location.href = 'vendas.php';</script>
              <?php
            }
            $vendasDB = new VendaDB;
            $array = $vendasDB->buscaVenda($venda->id);?>

        <p class="h3">Venda</p>
        <div class="container py-2 mt-2 mb-2">
          <div class="row py-2 ">
          <div class="col-md-3">
            <button type="button" name="addProduto" data-toggle="modal" data-target="#addProdutoModal" class="btn btn-primary text-white"><i class="fas fa-cart-arrow-down"> Adiciona Produto</i></button>

            <div class="modal fade" id="addProdutoModal" tabindex="-1" role="dialog" aria-labelledby="addProdutoModal" aria-hidden="true">

              <div class="modal-dialog" role="form">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fas fa-cart-arrow-down" id="addProduto"> Adicionar Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <div class="alert alert-info" role="alert"> Selecione o produto e informe a quantidade </div>
                    <div>
                      <form id="addProdutoModal" action="" method="post">
                        <div class="form-group">
                         <select class="custom-select" id="inputPordutoModal" name="inputPordutoModal">
                      <?php
                      $produtoDB = new ProdutoDB;
                      $arrayp = $produtoDB->listaProdutos();
                      foreach($arrayp as $a){?>
                        <option value="<?php printf("$a->Nome")?>"><?php printf("$a->Nome")?></option>
                      <?php }?>
                      </select>
                      </div>
                      <div class="form-group">
                        <input type="number" id="inputQuantidadeModal" name="inputQuantidadeModal" placeholder="Quantiade" min="1" required>
                        <input type="hidden" id="retomaVenda" name="retomaVenda" value="retomaVenda">
                        <input type="hidden" id="inputVendaID" name="inputVendaID" value="<?php printf($_POST['inputVendaID']); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addProdutoModal" id="btn-addProdutoModal" value="Entrar" class="btn btn-primary ml-2 text-white"><i class="fas fa-cart-arrow-down"> Adicionar Produto</i>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <div class="col-md-3">
              <form id="finalizaVenda" action="" method="post">
                <input type="hidden" id="retomaVenda" name="retomaVenda" value="retomaVenda">
                <input type="hidden" id="inputVendaID" name="inputVendaID" value="<?php printf($_POST['inputVendaID']); ?>">
                <button type="submit" name="finalizaVenda" class="btn btn-primary text-white"><i class="fas fa-shopping-cart"> Finaliza Venda</i></button>
              </form>
            </div>
            <div class="col-md-3">
              <?php
              if($u->Grupo =="Administrador"){ ?>
                <form id="cancelarVenda" action="" method="post">
                  <input type="hidden" id="inputVendaID" name="inputVendaID" value="<?php printf($_POST['inputVendaID']); ?>">
                  <button type="submit" name="cancelarVenda" class="btn btn-primary text-white" value="cancelarVenda"><i class="fas fa-ban"> Cancela Venda</i></button>
                </form>
              <?php }else{ ?>
                <button type="button" name="cancelarVenda" data-toggle="modal" data-target="#cancelarVendaModal" class="btn btn-primary text-white"><i class="fas fa-ban"> Cancela Venda</i></button>
                <div class="modal fade" id="cancelarVendaModal" tabindex="-1" role="dialog" aria-labelledby="cancelarVendaModal" aria-hidden="true">
                  <div class="modal-dialog" role="form">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title fas fa-times" id="cancelarVendaModal"> Acesso Negado!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="alert alert-danger" role="alert"> Necessário ser administrador para cancelar a venda! </div>
                            <form id="cancelarVenda" action="" method="post">
                                <div class="form-group ">
                                    <input type="hidden" id="inputVendaID" name="inputVendaID" value="<?php printf($_POST['inputVendaID']); ?>">
                                    <input type="text" class="form-control" id="inputLoginModal" name="inputLoginModal" placeholder="Login">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="inputPasswordModal" name="inputPasswordModal" placeholder="Senha">
                                </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="cancelarVenda" id="btn-loginModal" value="cancecancelarVendalaVenda" class="btn btn-primary ml-2 text-white"><i class="fas fa-ban"> Cancelar</i>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>

            </div>
            <div class="col-md-3">
              <form id="voltar" action="" method="post">
                <button type="submit" name="VOLTAR" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"> Voltar</i></button>
              </form>
            </div>
          </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <th>#</th>
                  <th>Protudo</th>
                  <th>Quantidade</th>
                  <th class="text-center" colspan="3">Ação</th>
                </thead>
                <tbody>
                  <?php
                  $cont = 0;
                      foreach($array as $a){//inicio for imprimi venda
                        $cont++;?>
                      <tr>
                        <th scope="row"><?php printf("$a->id");?></th>
                        <td><?php printf ("$a->produto");?></td>
                        <td><?php printf ("$a->quantidade");?></td>
                        <td>
                          <form id="removeProduto" action="" method="post">
                            <input type="hidden" id="retomaVenda" name="retomaVenda" value="retomaVenda">
                            <input type="hidden" id="inputVendaID" name="inputVendaID" value="<?php printf($a->id); ?>">
                            <input type="hidden" id="inputProdutoNome" name="inputProdutoNome" value="<?php printf($a->produto); ?>">
                            <input type="hidden" id="inputProdutoStatus" name="inputProdutoStatus" value="<?php printf($a->status); ?>">
                            <input type="hidden" id="inputProdutoQuantidade" name="inputProdutoQuantidade" value="<?php printf($a->quantidade); ?>">
                            <?php if($u->Grupo == "Administrador"){ //inicio testa cancela produto permissão?>
                              <button type="submit" name="removeProduto" class="btn btn-primary text-white"><i class="fas fa-ban"> Remove produto</i></button>
                            <?php }else{ //fim testa cancela produto permissão inicio else modal?>
                              <button type="button" name="removeProduto<?php printf("$cont") ?>" data-toggle="modal" data-target="#removeProdutoModal<?php printf("$cont") ?>" class="btn btn-primary text-white"><i class="fas fa-ban"> Remove produto</i></button>
                              <!-- Modal -->
                              <div class="modal fade" id="removeProdutoModal<?php printf("$cont") ?>" tabindex="-1" role="dialog" aria-labelledby="removeProdutoModal<?php printf("$cont") ?>" aria-hidden="true">
                                <div class="modal-dialog" role="form">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title fas fa-times" id="removeProduto"> Acesso Negado!</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="alert alert-danger" role="alert"> Necessário ser administrador para remover produto! </div>
                                          <form id="loginModal" action="" method="post">
                                              <div class="form-group ">
                                                    <input type="hidden" id="retomaVenda" name="retomaVenda" value="retomaVenda">
                                                    <input type="hidden" id="removeProduto" name="removeProduto" value="removeProduto">
                                                    <input type="hidden" id="inputVendaID" name="inputVendaID" value="<?php printf($a->id); ?>">
                                                    <input type="hidden" id="inputProdutoNome" name="inputProdutoNome" value="<?php printf($a->produto); ?>">
                                                    <input type="hidden" id="inputProdutoQuantidade" name="inputProdutoQuantidade" value="<?php printf($a->quantidade); ?>">
                                                    <input type="hidden" id="inputProdutoStatus" name="inputProdutoStatus" value="<?php printf($a->status); ?>">
                                                  <input type="int" class="form-control" id="inputLoginModal" name="inputLoginModal" placeholder="Login">
                                              </div>
                                              <div class="form-group">
                                                  <input type="password" class="form-control" id="inputPasswordModal" name="inputPasswordModal" placeholder="Senha">
                                              </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" name="loginModal" id="btn-loginModal" value="Entrar" class="btn btn-primary ml-2 text-white"><i class="fas fa-ban"> Remove</i>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php } //fim else modal?>
                          </form>
                        </td>
                      </tr>
                  <?php } //fim for imprimi venda?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    <?php } else { //fim if testa retomar venda pendente inicio else tela vendas?>

      <p class="h3">Vendas - Pendentes</p>
      <div class="container py-4 mt-2 mb-2">
        <div class="table-responsive">
          <div class=" py-2">
             <form id="addVendaForm" action="" method="post">
               <input type="hidden" id="retomaVenda" name="retomaVenda" value="retomaVenda">
              <button type="submit" name="addVenda" id="btn-addProdutoModal" value="addVenda" class="btn btn-primary ml-2 text-white"><i class="fas fa-cart-arrow-down"> Incluir Venda</i>
              </form>
          </div>
          <table class="table table-striped">
            <thead>
              <th>#</th>
              <th>Protudos</th>
              <th class="text-center" colspan="3">Ação</th>
            </thead>
          <tbody>

          <?php
          $contC = 0;
          foreach($array as $a){ //inicio imprimi vendas vendentes
            $contC = $contC + 1;
            ?>
            <tr>
              <?php if($a->status==0){ //inicio if status da venda pra serpareção?>
                <th scope="row"><?php printf("$a->id");?></th>
                <td><?php if ($a->produto == NULL){
                                printf (" ");
                              }else{printf ("$a->produto");}?></td>
                <td class="text-right">
                  <form id="retomaVenda" action="" method="post">
                    <input type="hidden" id="inputVendaID" name="inputVendaID" value="<?php printf("$a->id"); ?>">
                    <button type="submit" name="retomaVenda" class="btn btn-primary text-white"><i class="fas fa-cart-arrow-down"> Remotar venda</i></button>
                  </form>
                </td>
                <td>
                    <?php
                    //inicio teste para modal efetuado cancelar venda
                    if($u->Grupo != "Administrador") {?>
                      <!-- Button trigger modal -->
                      <button type="button" name="cancelarVenda<?php printf("$contC") ?>" data-toggle="modal" data-target="#cancelarVendaModal<?php printf("$contC") ?>" class="btn btn-primary text-white"><i class="fas fa-ban"> Cancelar venda</i></button>
                      <!-- Modal -->
                      <div class="modal fade" id="cancelarVendaModal<?php printf("$contC") ?>" tabindex="-1" role="dialog" aria-labelledby="cancelarVendaModal<?php printf("$contC") ?>" aria-hidden="true">
                        <div class="modal-dialog" role="form">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title fas fa-times" id="cancelarVendaModal"> Acesso Negado!</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="alert alert-danger" role="alert"> Necessário ser administrador para cancelar a venda! </div>
                                  <form id="cancelarVenda" action="" method="post">
                                      <div class="form-group ">
                                          <input type="hidden" id="inputVendaID" name="inputVendaID" value="<?php printf("$a->id"); ?>">
                                          <input type="int" class="form-control" id="inputLoginModal" name="inputLoginModal" placeholder="Login">
                                      </div>
                                      <div class="form-group">
                                          <input type="password" class="form-control" id="inputPasswordModal" name="inputPasswordModal" placeholder="Senha">
                                      </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" name="cancelarVenda" id="btn-loginModal" value="cancelarVenda" class="btn btn-primary ml-2 text-white"><i class="fas fa-ban"> Cancelar</i>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php }else{  // fim if vendedor botao modal
                      ?>
                      <form id="cancelarVenda<?php printf("$contC") ?>" action="" method="post">
                          <input type="hidden" id="inputVendaID" name="inputVendaID" value="<?php printf("$a->id"); ?>">
                          <button type="submit" name="cancelarVenda" id="btn-loginModal" value="cancelarVenda" class="btn btn-primary ml-2 text-white"><i class="fas fa-ban"> Cancelar venda</i>
                        </form>
                    <?php } // Fim else admin botao modal?>
                </td>
              <?php } //Fim if status da venda pra serpareção?>
            </tr>
          <?php } //fim imprimi vendas?>
                    </tbody>
                  </table>
                </div>
              </div>

    <div class="jumbotron text-center">
      <p class="h3">Vendas - Efetuadas</p>
      <div class="container py-4 mt-2 mb-2">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <th>#</th>
              <th>Protudos</th>
              <th class="text-center" colspan="3">Ação</th>
            </thead>
          <tbody>
          <?php foreach($array as $a){ //inicio imprimi vendas eftuadas?>
            <tr>
              <?php if($a->status==1){ //inicio if para idendificação das vendas?>
                <th scope="row"><?php printf("$a->id")?></th>
                <td><?php printf ("$a->produto")?></td>
                <td>
                <?php
                if($u->Grupo != "Administrador") { //inicio if testa permissão excluir venda mostra modal caso nao seja admin?>
                  <!-- Button trigger modal -->
                  <td class"text-right"><button type="button" name="exluirVenda" data-toggle="modal" data-target="#exluirVendaModal" class="btn btn-primary text-white"><i class="far fa-trash-alt"> Excluir venda</i></button><td>
                  <!-- Modal -->
                  <div class="modal fade" id="exluirVendaModal" tabindex="-1" role="dialog" aria-labelledby="exluirVendaModal" aria-hidden="true">
                    <div class="modal-dialog" role="form">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title fas fa-times" id="exluirVendaModal"> Acesso Negado!</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="alert alert-danger" role="alert"> Necessário ser administrador para excluir venda! </div>
                              <form id="exluirVendaModal" action="" method="post">
                                  <div class="form-group ">
                                      <input type="hidden" id="inputVendaID" name="inputVendaID" value="<?php printf("$a->id"); ?>">
                                      <input type="int" class="form-control" id="inputLoginModal" name="inputLoginModal" placeholder="Login">
                                  </div>
                                  <div class="form-group">
                                      <input type="password" class="form-control" id="inputPasswordModal" name="inputPasswordModal" placeholder="Senha">
                                  </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name="exluirVenda" id="btn-loginModal" value="exluirVenda" class="btn btn-primary ml-2 text-white"><i class="fas fa-ban"> Excluir</i>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php }else{ //fim if testa permissão excluir venda mostra modal caso nao seja admin incio else caso admin somente exlui
                  ?>
                  <form id="exluirVendaModal" action="" method="post">
                      <input type="hidden" id="inputVendaID" name="inputVendaID" value="<?php printf("$a->id"); ?>">
                      <button type="submit" name="exluirVenda" id="btn-loginModal" value="exluirVenda" class="btn btn-primary ml-2 text-white"><i class="fas fa-ban"> Excluir venda</i>
                    </form>

                <?php } //fim else caso admin somente exlui?>
              </td>
              <?php } //inicio iff para idendificação das vendas ?>
            </tr>
        <?php } //fim imprimi vendas eftuadas?>
      </tbody>
          </table>
          </div>
        </div>
    </div>
<?php } //fim else tela vendas?>
  </div>
</div>
  <?php
      if(isset($_POST['deslogar'])){
          unset($_SESSION['privateUser']);
          header("location:index.php");
        }

  }else{ //fim if testa usuario logado
    header("location:index.php");
  }?>


<!--Rodape-->
  <div class="py-3 footer">
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
