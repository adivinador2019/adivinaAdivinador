<?php
	session_start();
	if (isset($_SESSION['uLIVES'])) {
		require_once('../config/cUsuario.php');
		$up = new cUsuario();
		$up->updataLives($_SESSION['uUSER'], $_SESSION['uLIVES'], 2);
		$_SESSION['uLIVES'] -= 2;
		unset( $_SESSION["lastAdivinaza"] );
		header("Location: ./index.php");
	}