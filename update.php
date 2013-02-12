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
    $room = $_POST['room'];
    $user = $_GET['user'];

	$sp = "{call update_rooms_admin( ?, ?)}";
	
	//print_r ($state);
	//print_r ($city);
	// Bind the parameters
	$params = array(
					array($user,SQLSRV_PARAM_IN),
					array($room,SQLSRV_PARAM_IN),
					);

	// Execute the query
	$result = sqlsrv_query ($conn,$sp,$params);
	
	if( $result === false) {
		die( print('Room Number Does not exist')); //print_r( sqlsrv_errors(), true) );
	} else {
		 $url = urlencode($user);
		 header("Location: admin.php?user=" .$url);
		 exit;
	}
	
    sqlsrv_free_stmt($result);
	sqlsrv_close($conn)
?>
?>