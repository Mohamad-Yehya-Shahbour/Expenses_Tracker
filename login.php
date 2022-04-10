<?php
session_start();

?>

<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Creative Colorlib SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="style/font.css" rel="stylesheet">
<link href="style/style.css" rel="stylesheet">
<link href="style/bootstrap4.min.css" rel="stylesheet">
<!-- //web font -->
</head>
<body>

	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1 class="text-white">
			<?php
				if (!empty($_SESSION["checking"])){
				$msg = $_SESSION["checking"];
				echo $msg;} 
				else{echo "SignIn";} 
			?>
		</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="php/login.php" method="post" id="loginfrom">
					<input id="email" class="text email" type="email" name="email" placeholder="Email" required="">
					<input  id="pass" class="text" type="password" name="pass" placeholder="Password" required="">
					<div class="wthree-text">
						<div class="clear"> </div>
					</div>
					<input id="loginsubmit" type="submit" value="LOGIN">
				</form>
				<p>Do not have an Account? <a href="index.php"> Signup Now!</a></p>
			</div>
		</div>
		
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
	<script src="js/jquery.min.js"></script>
	<script src="js/login.js" type="text/javascript"></script>
</body>
</html>