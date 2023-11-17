<?php
require('db_funcoes.php');
$pdo = connect_to_database("servweb");

$nome=$_POST['inputFName'];
$cpf=$_POST['inputCPF'];
$email=$_POST['inputEmail'];
$endereco=$_POST['inputEndereco'];
$cep=$_POST['inputZip'];
$senha=$_POST['inputPassword'];
$cidade=$_POST['inputCidade'];
$estado=$_POST['inputEstado'];
$servico=$_POST['inputServico'];
//$descicao=$_POST['inputDesc'];
//$foto=$_POST['inputFoto'];
//$tarifa=$_POST['inputTarifa'];
//$sql="SELECT id_cidade FROM cidades WHERE nome="$cidade;
//$id_cidade=$sql;
//$sql="SELECT id_cidade FROM estados WHERE nome="$estado;
//$id_estado=$sql;
$sql="INSERT INTO cadastro (cpf, nome, email, endereco, cep, id_cidade, id_estado, id_servico, senha)"."
VALUES (".$cpf.",'".$nome."','".$email."','".$endereco."',".$cep.",".$cidade.",".$estado.",".$servico.",'".$senha."');";
$pdo->exec($sql);
exit;
?>
