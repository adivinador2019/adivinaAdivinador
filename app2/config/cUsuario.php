<?php

	include_once('conexion.php');
	/**
	 * 
	 */
	class cUsuario extends Conexion
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function updataLives($usuario, $v, $cant){
			$vActual = $v - $cant;
			$usuario = $this->db->query("UPDATE usuarios set vida = '$vActual' WHERE usuario = '$usuario' ");
		}

		public function addLive($usuario, $v){
			$vActual = $v + 1;
			$usuario = $this->db->query("UPDATE usuarios set vida = '$vActual' WHERE id = '$usuario' ");
		}

		public function upLevel($usuario, $v){
			$new = $v;
			$usuario = $this->db->query("UPDATE usuarios set nivel = '$new' WHERE id = '$usuario' ");
			if($this->db->affected_rows > 0){
 				return true;
	 		}else{
	 			return false;
	 		}
		}



		
	}



?>