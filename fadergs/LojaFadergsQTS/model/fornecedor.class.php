<?php
class Fornecedor{
  private $id;
  private $Nome;
  private $CNPJ;
  private $Endereco;
  private $Email;
  private $Estado;


  public function __contruct(){}
  public function __destruct(){}
  public function __get($a){
    return $this->$a;
  }//Fecha __get

  public function __set($a,$v){
    $this->$a = $v;
  }//Fecha __set

  public function __toString(){
    return nl2br("Nome: $this->Nome CNPJ: $this->CNPJ Endereço: $this->Endereco Email: $this->Email Estado: $this->Estado");
  }//Fecha __toString
}//Fecha class
?>
