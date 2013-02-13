<?php
	session_start();
	if($_SESSION['loggedin'] !== 1){
	header("Location: login.php");
	exit;
} 
?>
<?php
/*
** Connect to database:
*/
    $serverName = "whale.csse.rose-hulman.edu";
	$uid = "lius"; 
	$pwd = "Lsq-278389"; 
    $connectionOptions =  array("UID"=>$uid, "PWD"=>$pwd, "Database"=>"#UPlan");
    $conn = sqlsrv_connect($serverName, $connectionOptions);
	
	$user = $_GET['user'];
 
    if($conn === false)
        {
            die(print_r(sqlsrv_errors(), true));
        }
 
	$sp = "{call Get_Rooms_admin( ?)}";
	$sp2 = "{call get_hotel_name(?)}";
	
	//print_r ($state);
	//print_r ($city);
	// Bind the parameters
	$params = array(
					array($user,SQLSRV_PARAM_IN)
					);
					
	$params2 = array(
					array($user,SQLSRV_PARAM_IN)
					);

	// Execute the query
	$result = sqlsrv_query ($conn,$sp,$params);
	$result2 = sqlsrv_query ($conn,$sp2,$params2);

	if( $result === false || $result2 === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	
	// Free the statement and close resources
	// sqlsrv_free_stmt($result);
	// sqlsrv_close($conn);

?>
<?php include 'header.php'?>
<meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Admin</title>
</head>
<body>
 <!-- Header and Nav -->
  
  <div class="row">
    <div class="twelve columns">
      <div class="panel">
        <h1><?php 
		$row2 = sqlsrv_fetch_array( $result2, SQLSRV_FETCH_ASSOC);
		echo $row2['Name'];
		?></h1>
      </div>
    </div>
  </div>
  
  <!-- End Header and Nav -->
  
  
  <div class="row">    
    
    <!-- Main Feed -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div class="six columns push-three">
      
      <!-- Feed Entry -->
	<table border="1"><tr> 
	<td>Room#</td> 
	<td>Vacancy</td> 
	</tr> 
	<?php 
	while ($row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC)) { 
	if ($row['Vacancy'] === 0){
		$vac = 'Vacant';
	} else {
		$vac = 'Occupied';
	}
	echo "<tr><td>".$row['Room#']."</td><td>".$vac."</td></tr>"; 

	} 
	?> 
	</table>
	
	<div class ="row">
	<div class = "ten columns">
	<form action="update.php?user=<?php echo $user;?>" method="post">
    <p>Type the Room Number of the Room that you want to change:</label><input id="room" name="room" type="text" /></p>
    <button class = "radius tiny button" type="submit">Update</button>
    </form>
	</div>	
    </div>
	
	<div class ="row">
	<div class = "ten columns">
		
	</div>	
    </div>
      <!-- End Feed Entry -->
	
	</div>
	
	
    <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="three columns pull-six">
      <div class="panel">
        <a href="#"><img src="http://lorempixel.com/300/240/city" /></a>
        <h5><a href="#">Hotel Administration</a></h5>
        <!--
        <dl class="vertical tabs">
          <dd><a href="#">Section 1</a></dd>
          <dd><a href="#">Section 2</a></dd>
          <dd><a href="#">Section 3</a></dd>
          <dd><a href="#">Section 4</a></dd>
          <dd><a href="#">Section 5</a></dd>
          <dd><a href="#">Section 6</a></dd>
        </dl>
        -->
      </div>
    </div>
    
    
    <!-- Right Sidebar -->
    <!-- On small devices this column is hidden -->
    <aside class="three columns hide-for-small">
     
    </aside>
    
  </div>
<?php include 'footer.php'?>