<?php
	session_start();
	if($_SESSION['loggedin'] !== 1){
	header("Location: login.html");
	exit;
} 
	if($_SESSION['loggedin'] === 1){
	$_GET["username"] = "";
	header("Location: adminer.php?mssql=whale.csse.rose-hulman.edu&username=lius&db=%23UPlan&ns=dbo");
	exit; 
}
?>
