<!DOCTYPE html5>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!--The meta data for the site. This describes the site to the browser.-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="icon" type="image/x-icon" href="images/favicon.ico">
		<meta name="description" content="Graham's music database">
		<meta name="keywords" content="Graham, music, database">
		<meta name="author" content="Pierce Burt">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<!--Calls load() when the body loads-->
	<body id="load" onload="load()">
	<!--script to check if the body has loaded to make the website have colour-->
	<script src="js/script.js"></script>
		<div id="wrapper">
			<?php
			//Adds nav and header and kicks out logged in users
			require_once('nav.php');
			require_once("loginrequest.php");
			if(isset($_SESSION['login_user'])) {
				header('location: index.php');
			}
            ?>
			<!--page formatted in the same way as register page-->
			<div id="registerpage">
				<div id="registercard">
					<h2>Login</h2><form action="" method ="post">
					<div id="rlogin"><label>Username </label>
						<input type="text" name="username" autocomplete="off" class="rusername" placeholder="enter username"></div>
						<div id="rlogin"><label>Password </label>
						<input type="password" name="password" class="rpassword" placeholder="enter password"></div>
						<input id="rsublogin" type="submit" value="Submit">
						<p id="error"><?php echo $error;?></p>
						</div>
					</form>
					</div>
				</div><!-- end of content -->
			</div><!-- end of container -->
		</div>
	</body>
</html>
