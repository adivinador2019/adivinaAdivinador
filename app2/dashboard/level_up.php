
<script type="text/javascript">

	Swal.fire({
	  title: 'FELICIDADES',
		  text: 'Avista de todos ya no eres un <?=$_SESSION['uLEVEL']?>, tu conocimiento crece y crece',
		  animation: false,
		  customClass: {
		    popup: 'animated tada'
		  }
		});

</script>
<?php
	
	include_once('../config/cUsuario.php');
	$up = new cUsuario();

	switch ($_SESSION['uLEVEL']) {
		case 'NOVATO':
			$_SESSION['uLEVEL'] = "APRENDIZ";
			break;		
		case 'APRENDIZ':
			$_SESSION['uLEVEL'] = "MAESTRO";
			break;
		case 'MAESTRO':
			$_SESSION['uLEVEL'] = "EXPERTO";
			break;
		case 'EXPERTO':
			$_SESSION['uLEVEL'] = "SUPERIOR";
			break;
	}
	$up->upLevel($_SESSION['uID'], $_SESSION['uLEVEL']);
	

?>
<script type="text/javascript">
	setTimeout('document.location.reload()',3000);
</script>
