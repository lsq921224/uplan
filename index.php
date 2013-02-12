<?php include 'header.php'; ?>
<?php 
	session_start();
	if (array_key_exists('user', $_SESSION) AND $_SESSION['loggedin'] === 1) {
	$user = $_SESSION['user'];	
} else {
	$user = null;
}
?>

<link rel="stylesheet" href="stylesheets/joyride-2.0.3.css">
<meta charset="utf-8" />
<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width" />

<title>UPlan</title>
<body onload="document.forms[0].reset()">

<?php
	if ($user != null) {
		echo '
  <div class="row">
    <div class="twelve columns">
      <div class="panel">
         <h3>' .'Welcome back, '. $user . '</h3>
		 <div class="hide-for-small" style="text-align:right; margin-top:-45px;"><a class="radius button" href="logout.php">Logout</a></div>
         <div class="show-for-small" style="text-align:right; margin-top:0px;"><a class="radius button" href="logout.php">Logout</a></div>
      </div>
    </div>
  </div>';	
	}
?>
  
  <div class="row">
      <form action = "result.php" method="post">
		<div class = "three columns">
		<h5>State</h5>
		<label>
		<select onchange="print_city('city',this.selectedIndex);" id="state" name = "state"></select>
		</label>
		</div>
		<div class = "three columns">
		<h5>City</h5>		
		<label>
		<select name ="city" id = "city"></select>
		</label>
		</div>
		<script language="javascript">print_state("state");</script>
		<div class = "two columns">
		<h5>Place Type</h5>
		<label>
		<select name = "options" id = "options">
			<option id = "All" value = "All">All</option>
			<option id = "Lodge" value = "Lodges">Lodge</option>
			<option id = "Restaurant" value = "Restaurant">Restaurant</option>
			<option id = "Tourism" value = "Tourism">Tourism</option>
			<option id = "Night Life" value = "Night">Night Life</option>
			<option id = "Shopping" value = "Shopping">Shopping</option>
		</select>
		</label>
		</div>
		<div class = "two columns">	
		<h5>Sort By</h5>		
		<label>
		<select name = "sort" id = "sort">
			<option id = "price" value = "price">Price</option>
			<option id = "rating" value = "rating">Rating</option>
		</select>
		</label>
		</div>
		<div class="two columns">
		<h5><br></h5>
            <button id = 'gogo' class="radius small button" type = "submit">GO!</button>
        </div>
		<!-- <button class="radius button" type = "submit">GO!</button> -->
		</form>      
      
  </div>
  <br>
  <hr />
  <!-- Three-up Content Blocks -->
  
  <div class="row">
  
    <div class="four columns">
      <img src="http://lorempixel.com/400/300/food/" />
      <h4>Explore new places to go.</h4>
      <p>Ever wanted to try an awesome seafood restaurant in New York? Now there's a way to do so!</p>
    </div>
    
    <div class="four columns">
      <img src="http://lorempixel.com/400/300/city/" />
      <h4>Find a hotel and have a good rest.</h4>
      <p>Uplan allows you to find a hotel with vacant rooms.</p>
    </div>
    
    <div class="four columns">
      <img src="http://lorempixel.com/400/300/people/" />
      <h4>Completely Free.</h4>
      <p>Put away your credit card, our website is totally free.</p>
    
  </div>
  
  
  <!-- Call to Action Panel -->
  <div class="row">
    <div class="twelve columns">    
      <div class="panel">
        <h4>Get in touch!</h4>            
        <div class="row">
          <div class="nine columns">
            <p>We'd love to hear from you, reach out to us.</p>
          </div>
          <div class="three columns">
            <a href="contact_us.php" style="margin-top:-15px;" class="radius button right">Contact Us</a>
          </div>
        </div>
      </div>      
    </div>
  </div>
  
  
<!-- JoyRide -->
<!-- Tip Content -->
    <ol id="joyRideTipContent">
      <li data-id="state" data-text="Next"  data-options="tipLocation:bottom;tipAnimation:fade" class="custom">
        <h2>Step #1</h2>
        <p>Select the state that you want to go to!</p>
      </li>
      <li data-id="city" data-button="Next" data-options="tipLocation:top;tipAnimation:fade">
        <h2>Step #2</h2>
        <p>Select the city that you want to go to!</p>
      </li>
      <li data-id="options" data-button="Next" data-options="tipLocation:bottom;tipAnimation:fade">
        <h2>Step #3</h2>
        <p>Choose the place type.</p>
      </li>
      <li data-id="sort" data-button="Next" data-options="tipLocation:bottom;tipAnimation:fade">
        <h2>Step #4</h2>
        <p>Do you want to sort the results by price or rating?</p>
      </li>
	  </li>
      <li data-id="gogo" data-button="Close" data-options="tipLocation:bottom;tipAnimation:fade">
        <h2>OK, Let's GO!</h2>
        <p>Just click the button!</p>
      </li>
    </ol>

<!-- Run the plugin -->
<script type="text/javascript" src="javascripts/jquery-1.8.3.js"></script>
<script type="text/javascript" src="javascripts/jquery.cookie.js"></script>
<script type="text/javascript" src="javascripts/modernizr.mq.js"></script>
<script type="text/javascript" src="javascripts/jquery.joyride-2.0.3.js"></script>
<script type="text/javascript">
  $(window).load(function() {
    $('#joyRideTipContent').joyride({postStepCallback : function (index, tip) {
        if (index == 5) {
          $(this).joyride('set_li', false, 1);
        }
    }});
  });
</script>


 <?php include 'footer.php'; ?>
