
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
			
			<div id="loginpage">
				<div id="logincard">
					<h2>Login</h2><img id="loginclose" src="images/cross.png"><form action="" method ="post">
					<div id="login"><label>Username </label>
						<input type="text" name="username" autocomplete="off" class="username" placeholder="enter username"></div>
						<div id="login"><label>Password </label>
						<input type="password" name="password" class="password" placeholder="enter password"></div>
						<input id="sublogin" type="submit" value="Submit">
						<p id="error"><?php echo $error;?></p>
						</div>
					</form>
					</div>
				</div><!-- end of content -->
			</div><!-- end of container -->
		</div>
	</body>
</html>
