<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
	<title>UPlan</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />  
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
	<script type= "text/javascript" src = "states.js"></script>
	<meta name="description" content="A web app that gives people a guideline in what to do, where to sleep, what to eat and things like like." />		
</head>
	<body>	
	<div id="container">
		<a id="login" href="login.html">Login</a>
		<a id="about" href="about.html">About</a>	
		<div id="name">UPlan</div>
	</div>	
	<div class="sc">
		<form action = "result.php" method="post">
		<select onchange="print_city('city',this.selectedIndex);" id="state" name = "state"></select>
		<select name ="city" id = "city"></select>
		<script language="javascript">print_state("state");</script>
		<select name = "options" id = "options">
			<option id = "All" value = "All">All</option>
			<option id = "Lodge" value = "Lodge">lodge</option>
			<option id = "Restaurant" value = "Restaurant">Restaurant</option>
			<option id = "Tourism" value = "Tourism">Tourism</option>
			<option id = "Night Life" value = "Night Life">Night Life</option>
			<option id = "Shopping" value = "Shopping">Shopping</option>
		</select>
		<button type = "submit">GO!</button>
		</form>
	</div>
	
	<br/>
	<div id="textcontent">
	</div>
	<div id="poweredby">Powered by: <a href="http://rose-hulman.edu">TBA</a></div>
	<div id="copyright">&copy;2013</div>
</body>