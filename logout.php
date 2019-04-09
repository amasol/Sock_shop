<?php
	session_start();
	$_SESSION['current_user'] = "";
	$_SESSION['adm'] = 0;
	header("Location: index.php");
?>