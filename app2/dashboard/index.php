<?php
	session_start();	
	if (!isset($_SESSION['uUSER'])) {		
		header("Location: ../login.php");
 	}	


include_once('./assets/head.php'); ?>
	
<div class="container">
	<div class="col-md-3 col-sm-12 m-auto">
	<?php
	if (isset($_SESSION['play'])) {
		if ($_SESSION['uLIVES'] >= 0) {
			date_default_timezone_set ( "America/Mazatlan" );
			$date= date('H:i:s'); 
			$newDate = strtotime ( '5 hour' , strtotime ($date) ) ;
			$newDate = date ( 'H:i:s' , $newDate);
			$_SESSION['muerte'] = $newDate;
			
			include_once('play.php');
		}else{
			include_once('run.php');
		}
	}else{
		include_once('run.php');
	}

	?>
	</div>
</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

