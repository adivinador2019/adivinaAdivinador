<?php
	session_start();
	if (isset($_SESSION['uUSER'])) {
		echo "<script>window.location.href='./dashboard';</script>";
		
	}else{
		echo "<script>window.location.href='login.php';</script>";		
	}