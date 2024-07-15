<?php
   $nome = $_POST["inputFName"];
   $sobrenome = $_POST["inputSName"];
   $email = $_POST["inputEmail"];
   $password = md5($_POST["inputPassword"]); 
   $endereco = $_POST["inputAddress"]; 
   $ciddade = $_POST["inputCity"];
   $estado = $_POST["inputState"]; 
   $codigoPostal = $_POST["inputZip"]; 
   $termoValid =$_POST["invalidCheck"]; 
      ?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="index.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
</head>
 <body>
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container"> <a class="navbar-brand" href="index.html">ServWEB</a> <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
              <a class="btn navbar-btn btn-primary ml-2 text-white" href="signup.html"><i class="fa fa-user-circle"></i> Sign Up</a>
        </ul>
        <ul class="navbar-nav">
          <a class="btn navbar-btn btn-primary ml-2 text-white"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Sign in</a>
        </ul>
      </div>
    </div>
  </nav>
    
    <div class="container-fluid">
      <div class="alert alert-success" role="alert">
      <h1>Usuário criado com sucesso!!</h1>
      </div>
       <div style="display: flex; justify-content: space-around">
       <div class="p-3" style="width :48% ">
            <ul class="list-group list-group-flush">
               <li class="list-group-item">Nome</li>
               <li class="list-group-item">Sobrenome</li>
               <li class="list-group-item">Email</li>
               <li class="list-group-item">Endereço</li>
               <li class="list-group-item">Cidade</li>
               <li class="list-group-item">Estado</li>
               <li class="list-group-item">Codigo Postal</li>
            </ul> 
        </div>
        <div class="p-3" style="width :48%">
            <ul class="list-group list-group-flush">
               <li class="list-group-item"><?php echo $nome ?></li>
               <li class="list-group-item"><?php echo $sobrenome ?></li>
               <li class="list-group-item"><?php echo $email ?></li>
               <li class="list-group-item"><?php echo $endereco ?></li>
               <li class="list-group-item"><?php echo $ciddade ?></li>
               <li class="list-group-item"><?php echo $estado ?></li>
               <li class="list-group-item"><?php echo $codigoPostal ?></li>
            </ul>
         </div>
       </div>
       <a class="btn btn-primary" href="index.html" role="button">Voltar</a>  
     </div>
    
 <div class="py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center d-md-flex align-items-center"> <i class="d-block fa fa-stop-circle fa-2x mr-md-5 text-primary"></i>
        <ul class="nav mx-md-auto d-flex justify-content-center">
          <li class="nav-item"> <a class="nav-link active" href="#">Home</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#">Features</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#">Pricing</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#">About</a> </li>
        </ul>
        <div class="row">
          <div class="col-md-12 d-flex align-items-center justify-content-md-between justify-content-center my-2"> <a href="#">
              <i class="d-block fa fa-facebook-official text-muted fa-lg mx-2"></i>
            </a> <a href="#">
              <i class="d-block fa fa-instagram text-muted fa-lg mx-2"></i>
            </a> <a href="#">
              <i class="d-block fa fa-twitter text-muted fa-lg ml-2"></i>
            </a> </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <p class="mt-2 mb-0">© 2018-2018 Leonardo. All rights reserved</p>
      </div>
    </div>
  </div>
</div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
