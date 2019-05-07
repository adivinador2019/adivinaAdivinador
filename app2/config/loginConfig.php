<?php
	
	if (isset($_POST['iniciar'])) {

		if (isset($_POST['usuario']) && isset($_POST['clave'])) {

			require_once("cLogin.php");
			$log = new cLogin();
			
			$usuario = $_POST['usuario'];
			$clave = $_POST['clave'];

			$r = $log->logIn($usuario, $clave);

			if ($r) {
				header("Location: ../dashboard");
			}else{
				header("Location: ../login.php?e=elogin");
			}
			
		}else{
			header("Location ../login.php?e=einicio");
		}


	}else{
		header("Location: ../login.php?a");
	}


?>