
<?php
	session_start();
		$error = null;
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				//Connect.php (tells where to connect servername, username, password, dbaseName)
				require_once('connect.php');
				//username and password sent from form
				$myusername = mysqli_real_escape_string($con, $_POST['username']);
				$mypassword = mysqli_real_escape_string($con, $_POST['password']);

				$sql = "SELECT user_id FROM login WHERE user_id = '$myusername' and password = '$mypassword'";

				$result = mysqli_query($con,$sql);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				
				$count = mysqli_num_rows($result);
				
				//If result matched $myusername and $mypassword, table row must be 1 row
				if($count == 1) {
					$_SESSION['login_user'] = $myusername;
					header("location: F02_EchoUser.php");
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
	<body>
		<div id="container">
			<div id="header">
				<h1>DISPLAYS THE LIST OF USERS</h1>
			</div><!-- end of header -->
			
			<?php require_once('nav.php'); ?>
	
			<div id="content">
				<img src="Jellyfish.jpg" alt="Just another broken image link" title="An image for an images sake" width="560px" />
				<div align="center">
					<h2><form action="" method ="post" id="login">
						<label id='login'>Username: </label>
						<input type="text" name="username" id="box" placeholder="enter username">
						<label id='login'>Password: </label>
						<input type="password" name="password" id="box" placeholder="enter password">
						<input type="submit" value="Submit">
					</form></h2>
					<?php echo $error;?>
				</div>
			</div><!-- end of content -->
			<div id="footer">
				<h2>The User List page</h2>
				<p>Tawa</p>
			</div><!-- end of footer -->
		</div><!-- end of container -->
	</body>
</html>
