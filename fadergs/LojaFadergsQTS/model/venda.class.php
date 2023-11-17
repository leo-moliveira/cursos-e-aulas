<?php
class Venda{
  private $id;
  private $produto;
  private $status;
  private $quantidade;


  public function __contruct(){}
  public function __destruct(){}
  public function __get($a){
    return $this->$a;
  }//Fecha __get

  public function __set($a,$v){
    $this->$a = $v;
  }//Fecha __set

  public function __toString(){
    return nl2br("Venda: $this->id Status: $this->status Produto: $this->produto Quantidade: $this->quantidade");
  }//Fecha __toString
}//Fecha class
?>
