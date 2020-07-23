
<?php
	session_start();
		$error = null;
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				//Connect.php (tells where to connect servername, username, password, dbaseName)
				require_once('connect.php');
				//username and password sent from form
				$myusername = mysqli_real_escape_string($con, $_POST['username']);
				$mypassword = mysqli_real_escape_string($con, $_POST['password']);

				$sql = "SELECT user_name FROM login WHERE user_name = '$myusername'";

				$result = mysqli_query($con,$sql);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				
				$count = mysqli_num_rows($result);
				
				//If result matched $myusername and $mypassword, table row must be 1 row
                require_once('errorcatching.php');
                if($count == 1) {
                    $error = "Your login name or password is invalid";
                    $_SESSION['login_user'] = $myusername;
				} else {
					$error = "Your login name or password is invalid";
					}
				}


?>

<!DOCTYPE html5>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>UserList</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body id="load" onload="load()">
	<script src="script.js"></script>
		<div id="wrapper">
			<?php require_once('nav.php'); ?>
			<div id="header">
				<img class="himg" src="images/headerimg.jpg">
				<h2 class="htext">Find your favourite songs here</h2>
				<h2 class="join"><a href="register.php">Join Now</a></h2>
			</div><!-- end of header -->
			
	
			<div id="content">
				<div>
					<h2><form action="" method ="post" id="login">
						<label id='login'>Username: </label>
						<input type="text" name="username" class="username" placeholder="enter username">
						<label id='login'>Password: </label>
						<input type="password" name="password" class="password" placeholder="enter password">
						<input type="submit" value="Submit">
					</form></h2>
					<?php echo $error;?>
				</div>
			</div><!-- end of content -->
			<div id="footer">
				<p>Copyright Pierce Burt 2020</p>
			</div><!-- end of footer -->
		</div><!-- end of container -->
	</body>
</html>