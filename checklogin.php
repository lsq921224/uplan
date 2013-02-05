<?php
//Start session
session_start();

$serverName = "whale.csse.rose-hulman.edu";
$uid = "lius"; 
$pwd = "Lsq-278389"; 
$connectionOptions =  array("UID"=>$uid, "PWD"=>$pwd, "Database"=>"#UPlan");
$conn = sqlsrv_connect($serverName, $connectionOptions);
if( $conn === false )
{
     echo "Could not connect.\n";
     die( print_r( sqlsrv_errors(), true));
}

	
//Then we retrieve the posted values for user and password.
$user = $_POST['user'];
$pass = $_POST['pass'];
$hash = $user . $pass;
$hashpass = sha1($hash);

$sql = "SELECT * FROM Admins WHERE username = (?)  AND password = (?)";

//Users defined in the database
$params = array($user,$hashpass);

$result = sqlsrv_query( $conn, $sql, $params);

if( $result === false )
{
     echo "Error in executing statement.\n";
     die( print_r( sqlsrv_errors(), true));
}

$count = 0;

while( $row = sqlsrv_fetch_object( $result))
{
	 $count = $count + 1;
}

if ($count > 0) {
	 //If user and pass match any of the defined users
	 $_SESSION['loggedin'] = 1;
	 header("Location: admin.php");
};
 
//If the session variable is not true, exit to exit page.
if($count === 0){
	$_SESSION['loggedin'] = 0;
    header("Location: login.html");
    exit;
};
?>