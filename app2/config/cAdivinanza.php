<?php

	include_once('conexion.php');
	/**
	 * 
	 */
	class cAdivinanza extends Conexion
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function recuperarcion(){
			$user = $_SESSION['uID'];
			$rec = $this->db->query("UPDATE usuarios set vida = '5' WHERE id = '$user'");
			if($this->db->affected_rows > 0){
				$_SESSION['uLIVES'] = 5;
 				return "<script>document.location.reload();</script>";
	 		}else{
	 			return false;
	 		}
		}


		public function experiencia($IDusuario, $nivel){

			$resp = $this->db->query("SELECT *, count(*) as total FROM usuario_adivinanza WHERE user_id = '$IDusuario' AND nivel = '$nivel' AND estado = 'correcto';");
			$array = $resp->fetch_array(MYSQLI_ASSOC);

			return $array['total'];
		}
		public function play(){
				$adivinanza = $this->getAdivinanzas();
				shuffle($adivinanza);
				foreach ($adivinanza as $adiv) {

				//saber si ya la contesto
					$r = $this->search_respuesta($adiv['id']);
					$ri = $this->search_respuesta_incorrecta($adiv['id']);
	
					if ($r) {	
						if ($ri) {
							return $adiv['id'];	
						}						
					}else{
						return $adiv['id'];
					}

				}
		}
		public function search_respuesta($adivinanza){
			$respuestas = $this->getRespuestas($_SESSION['uID']);

			$existe = false;
			foreach ($respuestas as $key) {
				if ($key['adivinanza_id'] == $adivinanza) {
					$existe = true;
				}
			}
			return $existe;
		}

		public function search_respuesta_incorrecta($adivinanza){
			$respuestas = $this->getRespuestasIncorrectas($_SESSION['uID']);

			$existe = false;
			foreach ($respuestas as $key) {
				if ($key['adivinanza_id'] == "") {
					return false;
				}else if ($key['adivinanza_id'] == $adivinanza) {
					$existe = true;
				}
			}
			return $existe;
		}

		public function comprobar($user, $adivinanza, $estado){

			$verifica = $this->db->query("SELECT *, count(*) as total FROM usuario_adivinanza WHERE user_id = '$user' AND adivinanza_id = '$adivinanza'");

			$datos = $verifica->fetch_array(MYSQLI_ASSOC);

			if ($datos['total'] > 0) {
				$this->actualizar_respuesta($user, $adivinanza, $estado);
				
			}else{
				$this->agregar_respuesta($user, $adivinanza, $estado);
			}

		}

		public function agregar_respuesta($user, $adivinanza, $estado){
			$nivel = $_SESSION['uLEVEL'];
			$add = $this->db->query("INSERT INTO usuario_adivinanza (user_id, adivinanza_id, nivel, estado) VALUES ('$user', '$adivinanza', '$nivel','$estado')");
		}

		public function actualizar_respuesta($user, $adivinanza, $estado){
			$upd = $this->db->query("UPDATE usuario_adivinanza set estado = '$estado'  WHERE user_id = '$user' AND adivinanza_id = '$adivinanza'");
		}

		public function getRespuestasCorrectas($IDusuario){

			$resp = $this->db->query("SELECT * FROM usuario_adivinanza WHERE user_id = '$IDusuario' AND estado != 'incorrecto';");

			$array = $resp->fetch_all(MYSQLI_ASSOC);

			return $array;

		}
		public function getRespuestasIncorrectas($IDusuario){

			$resp = $this->db->query("SELECT * FROM usuario_adivinanza WHERE user_id = '$IDusuario' AND estado != 'correcto';");

			$array = $resp->fetch_all(MYSQLI_ASSOC);

			return $array;

		}

		public function getRespuestas($IDusuario){

			$resp = $this->db->query("SELECT * FROM usuario_adivinanza WHERE user_id = '$IDusuario';");

			$array = $resp->fetch_all(MYSQLI_ASSOC);

			return $array;

		}

		public function getAdivinanzas(){

			$nivel = $_SESSION['uLEVEL'];
			$resp = $this->db->query("SELECT * FROM adivinanzas WHERE nivel = '$nivel';");
			$array = $resp->fetch_all(MYSQLI_ASSOC);

			return $array;

		}



		public function showAdivinanza($adivinanza){			

			$get = $this->db->query("SELECT * FROM adivinanzas WHERE id = '$adivinanza' ");

			$datos = $get->fetch_array(MYSQLI_ASSOC);
			$html = "";
			$html .= "
			<div class='row animated jackInTheBox' style='background-color: #FFA957'>
				<div class='col-12 p-3'>
				<strong>Adivina Adivinador</strong>
				<p class='text-white text-adivinanza'>
				".$datos['adivinanza']."
				</p>
				</div>
			</div>";

			$op = $this->generarArrayAdi($datos['id']);
			shuffle($op);
			$html .= "<div class='row mt-3 animated flipInX'>";

			for ($i=0; $i < 4; $i++) { 
				$respon = $op[$i];
				$html .= "
				<button id='b$i' class='col-6 btn p-3 bg-dark text-white border' onclick='verificar(".'"'.$respon.'"'.",".'"'.$adivinanza.'"'.");' >
				".$op[$i]."
				</button>
				";
			}
			$html .= "</div>";
			return $html;


		}

		public function verificar($respuesta, $id){

			$query = $this->db->query("SELECT * FROM adivinanzas WHERE id = '$id'");
			$result = $query->fetch_array(MYSQLI_ASSOC);

			if ($respuesta == $result['rcorrecta']) {
				return '1';
			}else{
				return '0';
			}

		}











	

		public function generarArrayAdi($adi){
			
			$adi = $this->db->query("SELECT rcorrecta, r2, r3, r4 FROM adivinanzas WHERE id = '$adi'");

			$result = $adi->fetch_array(MYSQLI_NUM);
	        return $result;

		}


		public function selectAdivinanza($usuario, $nivel){
			$adz = $this->getAdivinanzas($nivel);
			
			foreach ($adz as $key) {				
				$adi = $this->search($usuario, $key['id']);

				if ($adi['estado'] == "incorrecto" || $adi == "null") {
					return $adi['id'];
				}else{
					return ;
				}
			}
		}

		public function getAdivinanzas1($nivel){

			$datos = $this->db->query("SELECT * FROM adivinanzas WHERE nivel = '$nivel' ");
			$adi = $datos->fetch_all(MYSQLI_ASSOC); 
			return $adi;
		}

		public function search($usuario, $adi){
			$estado = array();
			$search = $this->db->query("SELECT *, count(*) as total FROM usuario_adivinanza WHERE user_id = '$usuario' AND adivinanza_id = '$adi'  ");

			$result = $search->fetch_array(MYSQLI_ASSOC);

			if ($result['total'] > 0) {
				$estado['id'] = $result['id'];
				$estado['estado'] = $result['estado'];
			}
			return $estado;
		}


		public function lista_blanca($usuarioID){

			$lista = $this->db->query("SELECT adivinanza_id FROM usuario_adivinanza WHERE user_id = '$usuarioID' ");
			$array = $lista->fetch_all(MYSQLI_ASSOC);
			return $array;
		}

		
	}



?>