<?php
class Usuario{
  private $id;
  private $Grupo;
  private $Login;
  private $Senha;

  public function __contruct(){}
  public function __destruct(){}
  public function __get($a){
    return $this->$a;
  }//Fecha __get

  public function __set($a,$v){
    $this->$a = $v;
  }//Fecha __set

  public function __toString(){
    return nl2br("email: $this->Login grupo: $this->Grupo");
  }//Fecha __toString
}//Fecha class
?>
