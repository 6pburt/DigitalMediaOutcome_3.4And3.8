<!DOCTYPE html5>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>UserList</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel='icon' href='images/favicon.ico' type='image/x-icon'/ >
	</head>
	<body id="load" onload="load()">
	<script src="js/script.js"></script>
		<div id="wrapper">
			<?php require_once('nav.php'); ?>
			<?php
				require_once("loginrequest.php");
				if(isset($_SESSION['login_user'])) {
					header('location: index.php');
				}
            ?>
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
