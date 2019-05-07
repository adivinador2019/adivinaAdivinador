

	<div class="row">
		<div class="col p-3 ">
			<i class="fas fa-user"></i> <?=$_SESSION['uUSER'];?>
		</div>
		<div class="col  p-3" >
			<i class="fas fa-heart"></i> <?=$_SESSION['uLIVES'];?>
		</div>
		<div class="col p-3">
			<i class="fas fa-brain"></i> <?=$_SESSION['uLEVEL'];?>
		</div>
	</div>	
	
	<?php
	require_once('../config/cAdivinanza.php');
	$r = new cAdivinanza();

	$exp = $r->experiencia($_SESSION['uID'], $_SESSION['uLEVEL']);
	if ($exp == 5) {
		require_once('level_up.php');
	}


	$var = $r->play();
	$_SESSION['configAdiv'] = $var;

	if($var != ''){
		if (isset($_SESSION['lastAdivinaza'])) {
			echo $r->showAdivinanza($_SESSION['lastAdivinaza']);
			
		}else{
			echo $r->showAdivinanza($var);
		}
	}

	?>
	<div id="response" ></div>
	<div class="col-md-12 col-sm-8 m-auto">
		Aciertos segidos = <?=$_SESSION['aciertos'];?> <br>
		5 acierto = 1 <i class="fas fa-heart"></i> 
	</div>
	
<div class="sticky-bottom mt-3">
	<button class="btn btn-info" id="info"><i class="fas fa-info"></i> Info</button>
	<a class="btn btn-light btn-lg form-control text-dark mb-3 mt-2" href="./pasar.php">2 <i class="fas fa-heart-broken"></i> Dar un Salto </a>
	
</div>

