<!DOCTYPE html>
<?php

	//Start session
	session_start();
	
	if (array_key_exists('user', $_SESSION) AND $_SESSION['loggedin'] === 1) {
	$user = $_SESSION['user'];
} else {
	$user = null;
}
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
	$sort = $_POST['sort'];
	
	if ($city === null || $city === '') {
		header("Location: index.php");
	}
 
    if($conn === false)
        {
            die(print_r(sqlsrv_errors(), true));
        }
 
	$sp = "{call Find_places_In_city_sort_by_price( ?, ? ,?)}";
	$sp1 = "{call Find_places_In_city_sort_by_rating( ?, ? ,?)}";

	//print_r ($state);
	//print_r ($city);
	// Bind the parameters
	$params = array(
					array($state,SQLSRV_PARAM_IN),
					array($city,SQLSRV_PARAM_IN),
					array ($options, SQLSRV_PARAM_IN)					
					);

	// Execute the query
	if ($sort = 'price'){
	$result = sqlsrv_query ($conn,$sp,$params);
	}
	if ($sort = 'rating'){
	$result = sqlsrv_query ($conn,$sp1,$params);
	}
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
  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/jquery.js"></script>
  <script src="javascripts/foundation.min.js"></script>
  <!-- include CSS & JS files -->
  <!-- CSS file -->
  <link rel="stylesheet" type="text/css" href="stylesheets/jRating.jquery.css" media="screen" />
  <!-- jQuery files -->
  <script type="text/javascript" src="javascripts/jRating.jquery.js"></script>
  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Welcome to UPlan</title>
</head>
<body>
  
  <!-- Header and Nav -->
  
  <div class="row">
    <div class="twelve columns">
      <div class="panel">
        <h1>
		<?php
			echo $city . " - " . $state;
		?>
		</h1>
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
	  $name = $row['Name'];
	  $kind = $row['kind'];
	  $price = $row['price'];
	  $rating = $row['rating'];
	  $id = $row['placeID'];
	  
	  echo '
      <div class="row">
        <div class="two columns mobile-one"><img src="http://lorempixel.com/80/80/city/' . rand(1,10). '"; /></div>
        <div class="ten columns">
          <p>' . 
		   'Name: '.$name . '<br>' .'Kind: '.$kind . '<br>'. 'Price: ' . $price. '<br>'.'Rating: '.'<p style="margin-top:-5px;" class="basic" data-average="' .$rating. '" data-id="'. $id.'"></p>'.'</p>		
			<form action = "placedetails.php?id='. $id. '"method="post">
			<button class = "radius tiny button" type="submit">Show Details</button>
			</form>
        </div>
      </div><hr/>
	   ';
	  
	  }
	
	  ?>
	  
	  <script type="text/javascript">
  $(".basic").jRating({
         step:true,
		 type: 'small',
		 rateMax: 5,
         length : 5, // nb of stars
		 phpPath: 'jRating.php',
		 canRateAgain : false,
		 decimalLength: 1,		 
         onSuccess : function(){
           alert('Success : your rate has been saved :)');
         },
		 onError : function() {
		   var user = '<?php echo $user; ?>';
		   if (user == null || user == '' || !user){
		   alert('You must log in first to rate.');	
		   window.location = "user.php";
		   } else {
		   alert('You have already rated this place.');
		   }
		 }
       });
</script>
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
    

<?php include 'footer.php'?>
