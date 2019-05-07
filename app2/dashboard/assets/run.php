<?php
	session_start();
	if (!isset($_POST['play'])) {
		$_SESSION['play'] = true;
		header("Location: ../index.php");
	}