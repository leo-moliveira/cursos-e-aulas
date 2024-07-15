<?php
class Padronizacao {
  public static function padronizarMaiMin($v){
    return ucwords(strtolower($v));
  }//Fecha padronizarMaiMin
}//Fecha class

class Seguranca {
  public static function criptografar($v){
    return md5('produtos'.$v.'estq');
  }//Fecha criptografar
}//Fecha class

class Validacao{

	public static function testarNome($val){
		$exp='/^[a-zA-ZáÁéÉíÍóÓúÚçÇãõÃÕ]{2,20}$/';
		return preg_match($exp,$val);
	}//Fecha testarNome

	public static function testarEmail($email){
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}//Fecha testarEmail

	public static function testarTelefone($val){
		$exp='/^[0-9]{8,12}$/';
		return preg_match($exp,$val);
	}//Fecha testarTelefone
/*
	public static function validarNome($val):Int{
	    $x = "/^[A-zÀ-ú ]{2,30}$/";
	    return preg_match($x, $val);
	  }

	  public static function validarEmail($v):int{
	    return filter_var($v,FILTER_VALIDATE_EMAIL);
	  }//fecha validar Email

	  public static function validarCpf($v):int{
	    $x = "/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/";
	    return preg_match($x, $val);
	  }
	  public static function validarRg($v):int{
	    $x = "/^{6,10}$/";
	    return preg_match($x, $val);
	  }

	  public static function validarSexo($val):Int{
	    $x = "/^[(Masculino|Feminino)]{8,9}$/";
	    return preg_match($x, $val);
	  }
	  public static function validarTelefone($val):Int{
	    $x = "/^\(?\d{2}\)?[\s-]?\d{4}-?\d{4}$/";
	    return preg_match($x, $val);
	  }

	  public static function validarCep($val):int{
	    $x = "/^[0-9]{5}-[0-9]{3}$/";
	    return preg_match($x, $val);
	  }
	  public static function validarCidade($val):Int{
	    $x = "/^[A-zÀ-ú ]{2,40}$/";
	    return preg_match($x, $val);
	  }
	  public static function validarBairro($val):Int{
	    $x = "/^[A-zÀ-ú ]{2,30}$/";
	    return preg_match($x, $val);
	  }
*/
}//Fecha class

?>
