<?php if ($_SESSION['uLIVES'] < 0): ?>
<img width="100%" src="assets/logo.png" class="animated tada">
<h1 class="lead m-3 animated bounceInRight"><i class="fas fa-heart-broken"></i> No tienes suficientes corazones</h1>
<h1 class=" lead" style="display: inline;">Hora Actual:</h1>
<h1 id="txt" class="col-12 m-auto animated infinite bounceIn ">00:00:00</h1>
<h1 class=" lead" style="display: inline;">Regresa a:</h1>
<h1 id="txt" class="col-12 m-auto "><?=$_SESSION['muerte'];?></h1>
<?php
	date_default_timezone_set ( "America/Mazatlan" );
	$date= date('H:i:s'); 
	if ($date > $_SESSION['muerte']) {
		require_once('../config/cAdivinanza.php');
		$ne = new cAdivinanza();
		echo $ne->recuperarcion();
	}

?>

<div class="sticky-bottom p-3">	
	<button id="recargar" class="btn btn-light form-control btn-lgtext-dark mb-3 mt-2" ><i class="fas fa-heart-broken"></i>Recargar</button>	
</div>


 

<?php else: ?>

<img width="100%" src="assets/logo.png" class="animated bounceInDown">
<form action="assets/run.php">
<button type="submit" name="play" class="btn btn-success form-control rounded  mt-3 animated bounceInUp" >Comenzar	</button>
</form>

<?php endif;?>


