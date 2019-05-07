
<?php
if (isset($_POST['respuesta']) AND isset($_POST['adivinanza'])) {
	include_once('../config/cAdivinanza.php');
	include_once('../config/cUsuario.php');
	$r = new cAdivinanza();
	$up = new cUsuario();
	session_start();

	$respuesta = $r->verificar($_POST['respuesta'],$_POST['adivinanza']);

	if ($respuesta == '1') {
		$tipo = "success";
		$titulo = "Excelente";
		$text = "Muy bien, eres bueno en esto.";
		$r->comprobar($_SESSION['uID'], $_POST['adivinanza'], 'correcto');
		$_SESSION['aciertos'] += 1;
		if ($_SESSION['aciertos'] == 5) {
			$up->addLive($_SESSION['uID'], $_SESSION['uLIVES']);
			$_SESSION['uLIVES'] +=1;
			$_SESSION['aciertos'] = 0;
		}

	}else{
		$tipo = "error";
		$titulo = "Oopss..";
		$text = "Algo te fallo, piensa un poco mas.";
		$r->comprobar($_SESSION['uID'], $_POST['adivinanza'], 'incorrecto');
		switch ($_SESSION['uLEVEL']) {
			case 'NOVATO':
				$up->updataLives($_SESSION['uUSER'], $_SESSION['uLIVES'], 1);
				$_SESSION['uLIVES'] -= 1;
				break;
			case 'APRENDIZ':
				$up->updataLives($_SESSION['uUSER'], $_SESSION['uLIVES'], 2);
				$_SESSION['uLIVES'] -= 2;
				break;
			case 'MAESTRO':
				$up->updataLives($_SESSION['uUSER'], $_SESSION['uLIVES'], 3);
				$_SESSION['uLIVES'] -= 3;
				break;
			case 'EXPERTO':
				$up->updataLives($_SESSION['uUSER'], $_SESSION['uLIVES'], 4);
				$_SESSION['uLIVES'] -= 4;
				break;
			case 'SUPERIOR':
				$up->updataLives($_SESSION['uUSER'], $_SESSION['uLIVES'], 4);
				$_SESSION['uLIVES'] -= 4;
				break;
		}
		$_SESSION['aciertos'] = 0;
		
	}

	echo "<script >
		Swal.fire({
		  type: '".$tipo."',
		  title: '".$titulo."',
		  text: '".$text."'		  
		});
		setTimeout('document.location.reload()',800);
		  </script >
	";
	unset( $_SESSION["lastAdivinaza"] );

}

?>
