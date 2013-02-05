<!DOCTYPE html>
<?php
/*
** Connect to database:
*/
    $serverName = "whale.csse.rose-hulman.edu";
	$uid = "lius"; 
	$pwd = "Lsq-278389"; 
    $connectionOptions =  array("UID"=>$uid, "PWD"=>$pwd, "Database"=>"#UPlan");
    $conn = sqlsrv_connect($serverName, $connectionOptions);
	
	$state = $_POST['state'];
	$city = $_POST['city'];
	$options = $_POST['options'];
 
    if($conn === false)
        {
            die(print_r(sqlsrv_errors(), true));
        }
 
	$sp = "{call Find_places_In_city( ?, ? ,?)}";
	
	//print_r ($state);
	//print_r ($city);
	// Bind the parameters
	$params = array(
					array($state,SQLSRV_PARAM_IN),
					array($city,SQLSRV_PARAM_IN),
					array ($options, SQLSRV_PARAM_IN)
					);

	// Execute the query
	$result = sqlsrv_query ($conn,$sp,$params);
	
	if( $result === false) {
		die( print_r( sqlsrv_errors(), true) );
	}

	//while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) {
	//	print_r($row);
	//}
	
	// Free the statement and close resources
	// sqlsrv_free_stmt($result);
	// sqlsrv_close($conn);

?>

<?php include 'header.php'?>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Welcome to UPlan</title>

  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="stylesheets/foundation.min.css">
  <link rel="stylesheet" href="stylesheets/app.css">

  <script src="javascripts/modernizr.foundation.js"></script>
</head>
<body>
  
  <!-- Header and Nav -->
  
  <div class="row">
    <div class="twelve columns">
      <div class="panel">
        <h1></h1>
      </div>
    </div>
  </div>
  
  <!-- End Header and Nav -->
  
  
  <div class="row">    
    
    <!-- Main Feed -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div class="six columns push-three">
      
      <!-- Feed Entry -->
	
	  <?php 
	  while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) {
	  echo '
      <div class="row">
        <div class="two columns mobile-one"><img src="http://lorempixel.com/80/80/city/' . rand(1,10). '"; /></div>
        <div class="ten columns">
          <p>' . 
		   'Name: '.$row['Name'] . '<br>' .'Address: '. $row['Address'] . '<br>'.'Phone: '. $row['phone'] . '<br>' .'Kind: '.$row['kind'] . '<br>'.  'Rating: '.$row['rating'].
		   '</p>          
        </div>
      </div>
      <hr />
	   ';
	  }
	  ?>
      <!-- End Feed Entry -->
	
	</div>
   
    <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="three columns pull-six">
      <div class="panel">
        <a href="#"><img src="http://lorempixel.com/300/240/city" /></a>
        <h5><a href="#">Places to Go</a></h5>
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
      <p><img src="http://lorempixel.com/300/440/city/<?php echo rand(1,10);?>" /></p>
      <p><img src="http://lorempixel.com/300/440/city/<?php echo rand(1,10);?>" /></p>
    </aside>
    
  </div>
    
  
  <!-- Footer -->


  <!-- Included JS Files (Uncompressed) -->
  <!--
  
  <script src="javascripts/jquery.js"></script>
  
  <script src="javascripts/jquery.foundation.mediaQueryToggle.js"></script>
  
  <script src="javascripts/jquery.foundation.forms.js"></script>
  
  <script src="javascripts/jquery.event.move.js"></script>
  
  <script src="javascripts/jquery.event.swipe.js"></script>
  
  <script src="javascripts/jquery.foundation.reveal.js"></script>
  
  <script src="javascripts/jquery.foundation.orbit.js"></script>
  
  <script src="javascripts/jquery.foundation.navigation.js"></script>
  
  <script src="javascripts/jquery.foundation.buttons.js"></script>
  
  <script src="javascripts/jquery.foundation.tabs.js"></script>
  
  <script src="javascripts/jquery.foundation.tooltips.js"></script>
  
  <script src="javascripts/jquery.foundation.accordion.js"></script>
  
  <script src="javascripts/jquery.placeholder.js"></script>
  
  <script src="javascripts/jquery.foundation.alerts.js"></script>
  
  <script src="javascripts/jquery.foundation.topbar.js"></script>
  
  <script src="javascripts/jquery.foundation.joyride.js"></script>
  
  <script src="javascripts/jquery.foundation.clearing.js"></script>
  
  <script src="javascripts/jquery.foundation.magellan.js"></script>
  
  -->
  
  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/jquery.js"></script>
  <script src="javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>
<?php include 'footer.php'?>


<!-- 
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>City</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />  
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="main.js"></script>
	<meta name="description" content="Result" />		
</head>
	<body>
	<div id="container">
		<div id="name">Result</div>
	</div>
		
	<div id="intro">
		Lodge
		<table border="1">
		<tr>
		<th>Name</th>
		<th>Address</th>
		<th>Phone</th>
		<th>E-mail</th>
		<th>Type</th>
		<th>Rating</th>

		</tr>
		<tr>
		<td>Hilton</td>
		<td>123 3rd St</td>
		<td>123123213</td>
		<td>hilton@hilton.com</td>
		<td>Hotel</td>
		<td>*****</td>
		</tr>
		<tr>
		<td>Days Inn</td>
		<td>59 S 400 St</td>
		<td>123456789</td>
		<td>Daysinn@daysinn.com</td>
		<td>Inn</td>
		<td>**</td>
		</tr>
		</table>
	</div>
	
	<div id="intro">
		Restaurant
		<table border="1">
		<tr>
		<th>Name</th>
		<th>Address</th>
		<th>Phone</th>
		<th>E-mail</th>
		<th>Type</th>
		<th>Rating</th>
		<th>Price</th>
		</tr>
		<tr>
		<td>KFC</td>
		<td>321 Poplar St</td>
		<td>123123213</td>
		<td>kfc@kfc.com</td>
		<td>Fast Food</td>
		<td>***</td>
		<td>$$</td>
		</tr>
		<tr>
		<td>McDonald's</td>
		<td>982 Wabash Ave</td>
		<td>0987213232</td>
		<td>mc@mcdonalds.com</td>
		<td>Fast Food</td>
		<td>***</td>
		<td>$$</td>
		</tr>
		</table>
	</div>
	
	<div id="intro">
		Tourism
		<table border="1">
		<tr>
		<th>Name</th>
		<th>Address</th>
		<th>Phone</th>
		<th>E-mail</th>
		<th>Type</th>
		<th>Rating</th>
		<th>Price</th>
		<th>Description</th>
		</tr>
		<tr>
		<td>Hawthorn Park</td>
		<td>6067 E Old Maple Ave</td>
		<td>(812)462-3225</td>
		<td>us@hawthornpark.com</td>
		<td>Parks</td>
		<td>****</td>
		<td>$</td>
		<td></td>
		</tr>
		<tr>
		<td>Meadows Theater</td>
		<td>1 Meadows Shopping Ctr</td>
		<td>(812)232-5536</td>
		<td></td>
		<td>Movies Theaters</td>
		<td>***</td>
		<td>$$$</td>
		<td></td>
		</tr>
		</table>
	</div>
	
	<div id="intro">
		Night Life
		<table border="1">
		<tr>
		<th>Name</th>
		<th>Address</th>
		<th>Phone</th>
		<th>E-mail</th>
		<th>Type</th>
		<th>Rating</th>
		<th>Price</th>
		<th>Age Limit</th>
		</tr>
		<tr>
		<td>The Verve</td>
		<td>677 Wabash Avenue</td>
		<td>(812) 234-9536</td>
		<td>us@thevervenightclub.com</td>
		<td>Bar</td>
		<td>****</td>
		<td>$$$</td>
		<td>21</td>
		</tr>
		<tr>
		<td>6th Avenue Gentlemens Club</td>
		<td>796 Lafayette Avenue</td>
		<td>(812)235-1631</td>
		<td></td>
		<td>Bar</td>
		<td>***</td>
		<td>$$$</td>
		<td>18</td>
		</tr>
		</table>
		
	</div>
	
	<div id="intro">
	Shopping
		<table border="1">
		<tr>
		<th>Name</th>
		<th>Address</th>
		<th>Phone</th>
		<th>E-mail</th>
		<th>Type</th>
		<th>Rating</th>
		<th>Hours</th>
		</tr>
		<tr>
		<td>Dollar Tree</td>
		<td>2191 S State Road</td>
		<td>(812)877-1892</td>
		<td></td>
		<td>Stores</td>
		<td>***</td>
		<td></td>
		</tr>
		<tr>
		<td>Maurices</td>
		<td>2199 S State Road</td>
		<td>(812)877-3138</td>
		<td></td>
		<td>Clothing</td>
		<td>***</td>
		<td></td>
		</tr>
		</table>		
	</div>
	
	<div id="poweredby">Powered by: <a href="http://rose-hulman.edu">TBA</a> </div>
	<div id="copyright">&copy;2013</div>
</body>
-- >