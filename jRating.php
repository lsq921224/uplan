<?php
$aResponse['error'] = false;
$aResponse['message'] = '';

session_start();
	if (array_key_exists('user', $_SESSION) AND $_SESSION['loggedin'] === 1) {
	$user = $_SESSION['user'];	

} else {
	$user = null;
	$success = false;
	$aResponse['error'] = true;
}
/*
	** Connect to database:
	*/
    $serverName = "whale.csse.rose-hulman.edu";
	$uid = "lius"; 
	$pwd = "Lsq-278389"; 
    $connectionOptions =  array("UID"=>$uid, "PWD"=>$pwd, "Database"=>"#UPlan");
    $conn = sqlsrv_connect($serverName, $connectionOptions);	
	
	
	
	
if(isset($_POST['action']))
{

	if(htmlentities($_POST['action'], ENT_QUOTES, 'UTF-8') == 'rating')
	{
	
		/*
		* vars
		*/
		$id = intval($_POST['idBox']);
		$rate = floatval($_POST['rate']);
		$hashuser = sha1($user);
		
		// YOUR MYSQL REQUEST HERE or other thing :)
		/*
		*
		*/
		$sp = "{call add_rating( ?,?,?)}";

		// Bind the parameters
		$params = array(
					array($hashuser,SQLSRV_PARAM_IN),
					array($id,SQLSRV_PARAM_IN),
					array($rate,SQLSRV_PARAM_IN)
					);
					
		$result = sqlsrv_query ($conn,$sp,$params);

		// Execute the query
		if( $result === false) {
			$success = false;
		} else {			
			$success = true;
		}
		
		
		// json datas send to the js file
		if($success)
		{
			$aResponse['message'] = 'Your rate has been successfuly recorded. Thanks for your rate :)';
			echo json_encode($aResponse);
		}
		else
		{
			$aResponse['error'] = true;
			$aResponse['message'] = 'An error occured during the request. Please retry';

			echo json_encode($aResponse);
		}
	}
	else
	{
		$aResponse['error'] = true;
		$aResponse['message'] = '"action" post data not equal to \'rating\'';
		echo json_encode($aResponse);
	}
}
else
{
	$aResponse['error'] = true;
	$aResponse['message'] = '$_POST[\'action\'] not found';
	
	echo json_encode($aResponse);
}