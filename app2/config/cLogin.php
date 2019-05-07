<?php

	include_once('conexion.php');
	/**
	 * 
	 */
	class cLogin extends Conexion
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function logIn($usuario, $clave){

			$clave = md5($clave);

			$usuario = $this->db->query("SELECT  *, count(*) as tt FROM usuarios WHERE usuario = '$usuario'AND clave = '$clave' ");
			$result = $usuario->fetch_array(MYSQLI_ASSOC);

			if ($result['tt'] > 0) {
				session_start();
				$_SESSION['uID'] = $result['id'];				
				$_SESSION['uUSER'] = $result['usuario'];				
				$_SESSION['uLEVEL'] = $result['nivel'];				
				$_SESSION['uLIVES'] = $result['vida'];	
				$this->configTemp($result['id']);
				
				return true;			
			}else{
				return false;
			}


		}

		public function configTemp($user){
			$get = $this->db->query("SELECT * FROM configtemp WHERE user_id = '$user'");
			$datos = $get->fetch_array(MYSQLI_ASSOC);
			if($this->db->affected_rows > 0){
				$_SESSION['lastAdivinaza'] = $datos['ultima_adivinanza_id'];
				$_SESSION['aciertos'] = $datos['aciertos'];
				if ($datos['recuperar'] != "00:00:00") {
					$_SESSION['muerte'] = $datos['recuperar'];
				}
 				return true;
	 		}else{

	 			$_SESSION['aciertos'] = 0;
	 			return false;
	 		}
		}

		public function existeConfig(){
			$user = $_SESSION['uID'];
			$existe = $this->db->query("SELECT * FROM configtemp WHERE user_id = '$user'");
			
			if($this->db->affected_rows > 0){
				$this->upConfigTemp();
 				return true;
	 		}else{
	 			$this->saveConfigTemp();
	 			return false;
	 		}
		}
		public function upConfigTemp(){
			$user = $_SESSION['uID'];
			
			if (isset($_SESSION['lastAdivinaza'])) {
				$adivinaza = $_SESSION['lastAdivinaza'];
				
			}else{
				$adivinaza = $_SESSION['configAdiv'];
			}

			if (isset($_SESSION['muerte'])) {
				$recuperar = $_SESSION['muerte'];
			}else{
				$recuperar = "00:00:00";
			}

			$aciertos = $_SESSION['aciertos'];

			$save = $this->db->query("UPDATE configtemp set ultima_adivinanza_id = '$adivinaza', aciertos = '$aciertos', recuperar = '$recuperar' WHERE user_id= '$user'");
			if($this->db->affected_rows > 0){
 				return true;
	 		}else{
	 			return false;
	 		}

		}

		public function saveConfigTemp(){
			$user = $_SESSION['uID'];			
			if (isset($_SESSION['lastAdivinaza'])) {
				$adivinaza = $_SESSION['lastAdivinaza'];				
			}else{
				$adivinaza = $_SESSION['configAdiv'];
			}

			if (isset($_SESSION['muerte'])) {
				$recuperar = $_SESSION['muerte'];
			}else{
				$recuperar = "00:00:00";
			}


			$aciertos = $_SESSION['aciertos'];
			$save = $this->db->query("INSERT INTO configtemp (user_id, ultima_adivinanza_id, aciertos, recuperar) VALUES ('$user', '$adivinaza', '$aciertos', '$recuperar')");
			if($this->db->affected_rows > 0){
 				return true;
	 		}else{
	 			return false;
	 		}

		}

		public function logOut(){
			session_start();
			$this->existeConfig();
			session_unset();
			session_destroy();
		}


		
	}



?>