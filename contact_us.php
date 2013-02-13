<?php 
include_once("/include/GoogleMap.php");
include_once("/include/JSMin.php");

$MAP_OBJECT = new GoogleMapAPI(); 
$MAP_OBJECT->_minify_js = isset($_REQUEST["min"])?FALSE:TRUE;
$MAP_OBJECT->addMarkerByAddress("5500 Wabash Ave,Terre Haute,IN","", "<b>UPlan Main Office!</b><br>Traveller's best friend!<br>
5500 Wabash Ave
Terre Haute, IN 47803");
?>

<?php include 'header.php';?>
<?php echo $MAP_OBJECT->getHeaderJS();?>
<?php echo $MAP_OBJECT->getMapJS();?>
</head>
  <!-- Main Page Content and Sidebar -->

  <div class="row">

    <!-- Contact Details -->
    <div class="twelve columns">

      <h3>Get in Touch!</h3>
      <p>We'd love to hear from you. You can either reach out to us as a whole and one of our awesome team members will get back to you, or if you have a specific question reach out to one of our staff. We love getting emails <em>all day</em>.</p>

      <dl class="contained tabs">
        <dd class="active"><a href="#contactForm">Contact The Team</a></dd>
      </dl>

      <ul class="tabs-content contained">

        <li id="contactPeopleTab" class="active">
          <ul class="block-grid five-up">
            <li><a href="mailto:marqueim@rose-hulman.edu"><img src="images/igor.jpg" /><br />Igor Marques</a></li>
            <li><a href="mailto:goldthea@rose-hulman.edu"><img src="images/edward.jpg" /><br />Edward Goldthorpe</a></li>
            <li><a href="mailto:lius@rose-hulman.edu"><img src="images/liu.gif" /><br />Shengqian Liu</a></li>

          </ul>
        </li>
      </ul>

    </div>

    <!-- End Contact Details -->

  </div>

  <!-- End Main Content and Sidebar -->


  


  <!-- Map Modal -->

  <div class="reveal-modal" id="mapModal">
    <h4>Where We Are</h4>
    <p><img src="http://placehold.it/800x600" /></p>

    <!-- Any anchor with this class will close the modal. This also inherits certain styles, which can be overriden. -->
    <a href="#" class="close-reveal-modal">&times;</a>
  </div>

  <!-- End Modal -->

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


  
  
  
  <!-- Three-up Content Blocks -->
  
  <div class="row">
	
    <div class="six columns">
      <h4>Main Office:</h4>
      <p>5500 Wabash Ave <br> Terre Haute, Indiana 47803-3920 </p>
    </div>
    
    <div class="six columns">
      <h4>Contact Number:</h4>
      <p>+1 (812) 239-8457</p>
    </div>
    <!--  <script> -->
	
  </div>
  <div class="row">
     <div id = "googlemap" class="six columns">
	 <h5>Map</h5>
		      <!-- Clicking this placeholder fires the mapModal Reveal modal -->
      <p>
        <?php echo $MAP_OBJECT->printOnLoad();?>
		<?php echo $MAP_OBJECT->printMap();?>
		<?php echo $MAP_OBJECT->printSidebar();?>
	   </p>
	   </div>
	</div>
<?php include 'footer.php'?>
 
  