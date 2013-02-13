<?php

	//Start session
	session_start();
	/*
	** Connect to database:
	*/
    $serverName = "whale.csse.rose-hulman.edu";
	$uid = "lius"; 
	$pwd = "Lsq-278389"; 
    $connectionOptions =  array("UID"=>$uid, "PWD"=>$pwd, "Database"=>"#UPlan");
    $conn = sqlsrv_connect($serverName, $connectionOptions);
	
	$id = $_GET['id'];	
 
    if($conn === false)
        {
            die(print_r(sqlsrv_errors(), true));
        }
 
	$sp = "{call get_placeDetail( ?)}";

	// Bind the parameters
	$params = array(
					array($id,SQLSRV_PARAM_IN)
					);

	// Execute the query
	
	$result = sqlsrv_query ($conn,$sp,$params);
	
	if( $result === false) {
		die( print_r( sqlsrv_errors(), true) );
	}

	$row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC);
	  
	$name = $row['Name'];
	$phone = $row['phone'];
	$kind = $row['kind'];
	$price = $row['price'];
	$rating = $row['rating'];
	$address = $row['Address'];
	$city = $row['City'];
	$state = $row['State_in'];
	

	// Free the statement and close resources
	// sqlsrv_free_stmt($result);
	// sqlsrv_close($conn);

?>
<?php 
include_once("/include/GoogleMap.php");
include_once("/include/JSMin.php");

$MAP_OBJECT = new GoogleMapAPI(); 
$MAP_OBJECT->_minify_js = isset($_REQUEST["min"])?FALSE:TRUE;
$MAP_OBJECT->addMarkerByAddress($address. ",".$city .",".$state ,"", "<b>".$name."</b><br>".$address. " ,".$city ." ,".$state);
?>
<?php include 'header.php' ?>
<?php echo $MAP_OBJECT->getHeaderJS();?>
<?php echo $MAP_OBJECT->getMapJS();?>
</head>
 <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Place Details</title>

</head>
<body>

 <!-- Header and Nav -->
 <div class="row">
    <div class="twelve columns">
      <div class="panel">
        <h1><?php 
		echo $name;
		?></h1>
      </div>
    </div>
  </div>

 <!-- Main Page Content -->
 <div class = "row">
 <div class = "four columns">
  <table border="1">
    <tr> 
	<td>Name</td> 
	<?php echo "<td>". $name ."</td>";?>
	</tr>
	<tr> 
	<td>Address</td> 
	<?php echo "<td>". $address." ,".$city." ,".$state ."</td>";?>
	</tr>
	<tr> 
	<td>Phone</td> 
	<?php echo "<td>". $phone ."</td>";?>
	</tr>
	<tr> 
	<td>Price</td> 
	<?php echo "<td>". $price ."</td>";?>
	</tr>
	<td>Rating</td> 
	<?php echo "<td>". $rating ."</td>";?>
	</tr>
	<td>Type</td> 
	<?php echo "<td>". $kind ."</td>";?>
	</tr>
	</table>
	<?php	   
	  if (trim($kind) == 'Lodges') {
	  $sp2 = "{call get_vacant_rooms( ?)}";

	  // Bind the parameters
	  $params2 = array(
					array($id,SQLSRV_PARAM_IN)
					);

      // Execute the query
	
	  $result2 = sqlsrv_query ($conn,$sp2,$params2);
	  echo '<table border="1"><tr> 
	       <td>Room#</td> 
	       <td>Vacancy</td> 
	       </tr> ';
	  while ($row = sqlsrv_fetch_array( $result2, SQLSRV_FETCH_ASSOC)) { 
		if ($row['vacancy'] === 0){
			$vac = 'Vacant';
		} else {
			$vac = 'Occupied';
		}
		echo "<tr><td>".$row['room#']."</td><td>".$vac."</td></tr>"; 
		}  
	   echo '</table> ';
	  }	  
	 ?>
	 
	</div>
	
	<div id = "googlemap" class="eight columns">
	 <h5>Map</h5>
		      <!-- Clicking this placeholder fires the mapModal Reveal modal -->
      <p>
        <?php echo $MAP_OBJECT->printOnLoad();?>
		<?php echo $MAP_OBJECT->printMap();?>
		<?php echo $MAP_OBJECT->printSidebar();?>
	   </p>
	   </div>
	</div>
</div>
<?php include 'footer.php'?>