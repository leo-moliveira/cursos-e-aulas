<?php
//Carrega tela de homepage
if($_GET['p'] == 'home') : ?>
  <div class="py-4 mt-2 mb-2">
    <div class="container">
      <div class="row text-center mb-5">
        <img src="img/servico.jpg" class="img-fluid" style="height: 200px; width: 60%; display: block;" alt="Serviços">
      </div>
      <div class="row">
        <div class="col-md-6">
          <h1>Seja bem vindo ao ServWEB</h1>
           <p></p>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like red.</p>
        </div>
        <div class="col-md-6">
         It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php
//Carrega tela de cadastro
/*nome,cpf,email,telefone,endereco,cep,Senha
cidade,Estado
servico,descicao,foto,tarifa*/
if($_GET['p'] == 'cadastro') : ?>
<script>
  $(document).ready(function() {
    $("#com_servico").hide();
    $('#check_servico').change(function() {
      if($(this).is(":checked")) {
          $("#com_servico").show();
          $("#servico").hide();
       } else {
          $("#com_servico").hide();
          $("#servico").show();
       }
    });
  });
</script>
<form class="col-xs-12 col-sm-12 mt-2" action="cadastro.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputFName">Nome</label>
      <input type="text" name="inputFName" class="form-control" id="inputFName" placeholder="Nome Completo" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputCPF">CPF</label>
      <input type="int" name="inputCPF" class="form-control" id="inputCPF" placeholder="CPF" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail">Email</label>
      <input type="email" name="inputEmail" class="form-control" id="inputEmail" placeholder="Email" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword">Senha</label>
      <input type="password" minlength="10" name="inputPassword" class="form-control" id="inputPassword" placeholder="Senha" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEndereco">Endereço</label>
    <input type="text" name="inputEndereco" class="form-control" id="inputEndereco" required>
  </div>

   <div class="form-row ">
     <div class="form-group col-md-4">
       <label for="inputEstado">Estado</label>
       <select id="inputEstado" name="inputEstado" class="form-control" required>
 	      	<option label="Selecione ...">
            <?php
            require('db_funcoes.php');
            $pdo = connect_to_database("servweb");
            $sql= "SELECT nome FROM estados ORDER BY nome ASC";
            $estados = $pdo->query($sql);
          while ($row = $estados->fetch()) {
            print "<option value=".$row['nome'].">".$row['nome']."</option>";
          }


      print"</select>
     </div>
    <div class=\"form-group col-md-4\">
      <label for=\"inputCidade\">Cidade</label>
      <select type=\"text\" name=\"inputCidade\" class=\"form-control\" id=\"inputCidade\" required>
        <option label=\"Selecione ...\">";
          $sql= "SELECT nome FROM cidades ORDER BY nome ASC";
          $cidades = $pdo->query($sql);
          while ($row = $cidades->fetch()) {
            print "<option value=".$row['nome'].">".$row['nome']."</option>";
          }
          ?>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">CEP</label>
      <input pattern="[0-9]{5}-[0-9]{3}" name="inputZip" class="form-control" id="inputZip" placeholder="Ex.: 00000-000" maxlength="9" autocomplete="off" required>
    </div>
  </div>
  <div class="form-group" id="servico">
    <div class="form-check">
      <input class="form-check-input" name="check_servico" type="checkbox" id="check_servico">
      <label class="form-check-label" for="validCheck">
        <h6>Deseja prestar serviços</h6>
      </label>
    </div>
  </div>
  <div class="form-group" id="com_servico">
    <div class="form-group">
      <label for="inputServico">Serviço</label>
      <input type="text" valeu="1" name="inputServico" class="form-control" id="inputServico" >
    </div>
    <div class="form-group">
      <label for="inputDesc">Descreva o serviço</label>
      <input type="text" value="1" name="inputDesc" class="form-control" id="inputDesc" >
    </div>
    <div class="form-group">
      <label for="inputTarifa" valeu="">Tarifa cobrada por hora</label>
      <input type="text" value="1" name="inputTarifa" class="form-control" id="inputTarifa" >
    </div>
    <div class="form-group">
      <label for="inputFoto" valeu="">Adicione uma foto</label>
      <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                <input type="file" value="1" id="inputFoto" >
                </span>
      </span>
    </div>
  </div>
  </div>
  <button type="submit" value="Enviar" class="btn btn-primary">Sign up</button>
</form>

<?php endif; ?>

<?php
//Carrega tela de login
if($_GET['p'] == 'entrar') : ?>
<script>
$(document).ready(function(){
	$('#errolog').hide(); //Esconde o elemento com id errolog
	$('#login-form').submit(function(){ 	//Ao submeter formulário
		var login=$('#inputCPF').val();	//Pega valor do campo email
		var senha=$('#inputPassword').val();	//Pega valor do campo senha
		$.ajax({			//Função AJAX
			url:"login.php",			//Arquivo php
			type:"post",				//Método de envio
			data: "login="+login+"&senha="+senha,	//Dados
   			success: function (result){			//Sucesso no AJAX
                		if(result==1){
                			location.href='restrito.php'	//Redireciona
                		}else{
                			$('#errolog').show();		//Informa o erro
                		}
            		}
		})
		return false;	//Evita que a página seja atualizada
	})
})
</script>
  <div class="login-form">
  <div class="login_main-div">
    <div class="panel">
   <h2>Login</h2>
   <p>Entre com seu CPF e Senha</p>
   </div>
    <form id="Login">
        <div class="form-group">
            <input type="int" class="form-control" id="inputCPF" placeholder="CPF">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="inputPassword" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
    </div>

<?php endif; ?>
