<?php
  require('db_funcoes.php');
  $pdo = connect_to_database("servweb");

  $login=$_POST['login'];	//Pegando dados passados por AJAX
  $senha=$_POST['senha'];

  //Consulta no banco de dados
  $sql="select * from cadastro where cpf='".$login."' and senha='".sha1($senha)."'";
  $resultados = mysql_query($sql)or die (mysql_error());
  $res=mysql_fetch_array($resultados); //
	if (@mysql_num_rows($resultados) == 0){
		echo 0;	//Se a consulta não retornar nada é porque as credenciais estão erradas
	}

	else{
		echo 1;	//Responde sucesso
		if(!isset($_SESSION)) 	//verifica se há sessão aberta
		session_start();		//Inicia seção
		//Abrindo seções
		$_SESSION['usuarioID']=$res['id'];
		$_SESSION['nomeUsuario']=$res['nome'];
		$_SESSION['email']=$res['email'];
		exit;
	}
?>
