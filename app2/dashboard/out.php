<?php
	include_once('../config/cLogin.php');

	$out = new cLogin();

	$out->logOut();

	echo "<script>window.location.href='../index.php';</script>";