<?php
	session_start();
	$_SESSION['user'] = null;
	$_SESSION['loggedin'] = 0;
	header('Location: index.php');
?>