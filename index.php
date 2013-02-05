<?php include 'header.php'; ?>

 <meta charset="utf-8" />
<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width" />
<title>UPlan</title>
<body>
  
  
  <!-- First Band (Slider) -->
  <!-- The Orbit slider is initialized at the bottom of the page by calling .orbit() on #slider -->
    
  <div class="row">
      <form action = "result.php" method="post">
		<div class = "four columns">
		<select onchange="print_city('city',this.selectedIndex);" id="state" name = "state"></select>
		</div>
		<div class = "four columns">
		<select name ="city" id = "city"></select>
		</div>
		<div class = "four columns">
		<script language="javascript">print_state("state");</script>
		<select name = "options" id = "options">
			<option id = "All" value = "All">All</option>
			<option id = "Lodge" value = "Lodges">Lodge</option>
			<option id = "Restaurant" value = "Restaurant">Restaurant</option>
			<option id = "Tourism" value = "Tourism">Tourism</option>
			<option id = "Night Life" value = "Night">Night Life</option>
			<option id = "Shopping" value = "Shopping">Shopping</option>
		</select>
		</div>
		<button type = "submit">GO!</button>
		</form>      
      <hr />
  </div>
  
  
  <!-- Three-up Content Blocks -->
  
  <div class="row">
  
    <div class="four columns">
      <img src="http://lorempixel.com/400/300/food/" />
      <h4>Explore new places to go.</h4>
      <p>Ever wanted to try a awesome thai restaurant in Terre Haute? Now there's an way to do so!</p>
    </div>
    
    <div class="four columns">
      <img src="http://lorempixel.com/400/300/city/" />
      <h4>Find a hotel to have a good rest.</h4>
      <p>Uplan allows you to find a hotel with vacant rooms.</p>
    </div>
    
    <div class="four columns">
      <img src="http://lorempixel.com/400/300/people/" />
      <h4>Completely Free.</h4>
      <p>Put away your credit card, our site is totally free.</p>
    
  </div>
  
  
  <!-- Call to Action Panel -->
  <div class="row">
    <div class="twelve columns">
    
      <div class="panel">
        <h4>Get in touch!</h4>
            
        <div class="row">
          <div class="nine columns">
            <p>We'd love to hear from you, you attractive person you.</p>
          </div>
          <div class="three columns">
            <a href="contact_us.php" class="radius button right">Contact Us</a>
          </div>
        </div>
      </div>
      
    </div>
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

  <script type="text/javascript">
     $(window).load(function() {
         $('#slider').orbit();
     });
  </script>

 <?php include 'footer.php'; ?>

