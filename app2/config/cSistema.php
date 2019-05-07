<?php
include_once('conexion.php');
 /**
  * 
  */
 class cSistema extends Conexion
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}



 	public function registrar($array){
 		$nombre = $array['nombre'];
 		$apellido = $array['apellido'];
 		$email = $array['email'];
 		$usuario = $array['usuario'];
 		$clave = md5($array['clave']);

 		$ver = $this->db->query("INSERT INTO usuarios (nombreUser, apellidoUser, emailUser, usuario, clave) VALUES ('$nombre', '$apellido', '$email', '$usuario', '$clave')");
 		if($this->db->affected_rows > 0){
 			return true;
 		}else{
 			return false;
 		}

 	}

 	public function verficar_user($user){
 		$ver = $this->db->query("SELECT * FROM usuarios WHERE usuario = '$user'");
 		if($this->db->affected_rows > 0){
 			return true;
 		}else{
 			return false;
 		}
 	}

	public function verficar_email($email){
 		$ver = $this->db->query("SELECT * FROM usuarios WHERE emailUser = '$email'");
 		if($this->db->affected_rows > 0){
 			return true;
 		}else{
 			return false;
 		}
 	}



 	function generarCodigo($longitud) {
	 $key = '';
	 $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	 $max = strlen($pattern)-1;
	 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
	 return $key;
	}


 }

