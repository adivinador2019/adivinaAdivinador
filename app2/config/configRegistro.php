<?php

	
	if (isset($_POST['iniciar'])) {
		 	

		include_once('cSistema.php');

		$sys = new cSistema();
		$error = false;

		$usuario['nombre'] = $_POST['nombre'];
		$usuario['apellido'] = $_POST['apellido'];
		$usuario['email'] = $_POST['email'];
		$usuario['usuario'] = $_POST['usuario'];
		$usuario['clave'] = $_POST['clave'];
		$clave2 = $_POST['clave2'];

		$vUsuario = $sys->verficar_user($usuario['usuario']);
		$vEmail = $sys->verficar_email($usuario['email']);
		if ($vEmail) {
			$error = true;
			$type = "error";
			$title = "Oops..";
			$text = "El email que intentas ingresar ya esta siendo utilizado. Intente con uno distinto";
			$animation = "animated tada";
		}else if ($vUsuario) {
			$error = true;
			$type = "error";
			$title = "Oops..";
			$text = "El usuario que intentas ingresar ya esta siendo utilizado. Intente con uno distinto";		
			$animation = "animated tada";	
		}else if ($usuario['clave'] != $clave2) {
			$error = true;
			$type = "error";
			$title = "Oops..";
			$text = "Las claves no coinciden. Intente de nuevo.";
			$animation = "animated tada";		
		}else{
			$inserUser = $sys->registrar($usuario);
			if ($inserUser) {
				$error = false;
				$type = "success";
				$title = "Excelente";
				$text = "Su registro a sido un exito.";
				$animation = "animated rubberBand";
			}else{
				$error = true;
				$type = "error";
				$title = "Oops..";
				$text = "No se ha podido realizar su registro. Intentelo lo mas tarde.";
				$animation = "animated tada";
			}
			
		}

		if ($error) {
			$msj = "<script>
				Swal.fire({
				  type: '".$type."',
				  title: '".$title.".',
				  text: '".$text."',
				  animation: false,
				  customClass: {
				    popup: '".$animation."'
				  }				  
				})
			</script>";			
		}else{
			$msj = "<script>
				Swal.fire({
				  type: '".$type."',
				  title: '".$title.".',
				  text: '".$text."',
				  animation: false,
				  customClass: {
				    popup: '".$animation."'
				  }				  
				});
				setTimeout(function(){ window.location.href='login.php'; }, 3000);

			</script>";
		}

		if ($msj != "") {
			echo $msj;
		}

	}
				