<?php include 'header.php'?>
 <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Login</title>

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
<div class="row">
	<div class="eight columns">
			<img src="http://lorempixel.com/1000/600/city/" />
    </div>
	<div class = "four columns">
	<div class="panel">
        <h5>Log In</h5>
    </div>
	<form action="checkuser.php" method="post">
    <p>Username:<input id="user" name="user" type="text" /></p>
    <p>Password:<input id="pass" name="pass" type="password" /></p>
	<br>
    <p><button class = "radius button middle" type="submit">Login</button></p>
	</form>
	<form action= "signup.php" method="link">
    <p><button class = "radius button middle" type="submit">Sign Up</button></p>
	</form>
	</div>
</div>

<?php include 'footer.php'?>