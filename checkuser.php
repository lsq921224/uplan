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

if ($user == null || $pass == null){
  echo '<script language="javascript">confirm("Please fill out all fields!!")</script>';
  echo '<script language="javascript">window.location = "signup.php"</script>';
  exit;
}

$hashuser = sha1($user);
$hash = $user . $pass;
$hashpass = sha1($hash);

$sp = "{call Check_regular_users( ?,?)}";

	// Bind the parameters
	$params = array(
					array($hashuser,SQLSRV_PARAM_IN),
					array($hashpass,SQLSRV_PARAM_IN),
					);
					
	$result = sqlsrv_query ($conn,$sp,$params);

	// Execute the query
	if( $result === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	
	$count = 0;

while( $row = sqlsrv_fetch_object( $result))
{
	 $count = $count + 1;
}

if ($count > 0) {
	 //If user and pass match any of the defined users
	 $_SESSION['loggedin'] = 1;
	 $_SESSION['user'] = $user;
	 header("Location: index.php?user=". $hashuser);
};
 
//If the session variable is not true, exit to exit page.
if($count === 0){
	 $_SESSION['loggedin'] = 0;
 	 $_SESSION['user'] = null;
	echo '<script language="javascript">confirm("Wrong username and password!")</script>';
	echo '<script language="javascript">window.location = "user.php"</script>';
	exit;
};


?>
