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
$confirmpass = $_POST['confirmpass'];

if ($user == null || $pass == null || $confirmpass == null){
  echo '<script language="javascript">confirm("Please fill out all fields!!")</script>';
  echo '<script language="javascript">window.location = "signup.php"</script>';
  exit;
}

if ($pass != $confirmpass) {	   
 $_SESSION['loggedin'] = 0;
 $_SESSION['user'] = null;         
  echo '<script language="javascript">confirm("The password and confirmpassword do not match!!")</script>';
  echo '<script language="javascript">window.location = "signup.php"</script>';
  exit;

}
$hashuser = sha1($user);
$hash = $user . $pass;
$hashpass = sha1($hash);

$sp = "{call add_user( ?,?)}";
$sp2 = "{call check_duplicate_username(?)}";

	// Bind the parameters
	$params = array(
					array($hashuser,SQLSRV_PARAM_IN),
					array($hashpass,SQLSRV_PARAM_IN)
					);
					
	$params2 = array(
					array($hashuser,SQLSRV_PARAM_IN)					
					);
					
	$result2 = sqlsrv_query ($conn,$sp2,$params2);

	if( $result2 === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	
	
	$count = 0;
	while( $row = sqlsrv_fetch_object( $result2))
{
	 $count = $count + 1;
}
	if ($count >0){
		echo '<script language="javascript">confirm("The username already exists!")</script>';
		echo '<script language="javascript">window.location = "user.php"</script>';
		exit;
	}
	
	$result = sqlsrv_query ($conn,$sp,$params);

	// Execute the query
	if( $result === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	
	else {
		$_SESSION['loggedin'] = 0;
 	    $_SESSION['user'] = null;
		echo '<script language="javascript">confirm("The user has been created!!")</script>';
		echo '<script language="javascript">window.location = "user.php"</script>';
		exit;
	}
	

?>
