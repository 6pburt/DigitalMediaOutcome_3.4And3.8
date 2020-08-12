
<?php
session_start();
$error = null;
if(isset($_SESSION['login_user'])) {
	header('location: index.php');
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
	//Connect.php (tells where to connect servername, username, password, dbaseName)
	require_once('connect.php');
	//username and password sent from form
	$myusername = mysqli_real_escape_string($con, $_POST['username']);
	$hashpass = hash('sha256', mysqli_real_escape_string($con, $_POST['password']));
	$hashconf = hash('sha256', mysqli_real_escape_string($con, $_POST['passconf']));
				
	if($hashpass == $hashconf) {
		$sql = "SELECT user_name FROM login WHERE user_name = '$myusername'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
						
		//If result matched $myusername and $mypassword, table row must be 1 row
		if($count == 1) {
			$error = "Your login name is taken";
		} 

		elseif(strlen($myusername) > 15) {
			$error = "Please enter a Username no longer than 15 characters.";
		}

		else {
			$error = "Valid Username and Password";
			$registerqry = "INSERT INTO login( user_name, `password`) VALUES('$myusername', '$hashpass')";
			if(mysqli_query($con,$registerqry)){
				$error = "Registered!";
				header('location: loginpage.php');
			}
			else{
				$error = "Cannot register. Unknown error.";
			}
		}
	}
	else{
		$error = "Passwords do not match.";
	}
}


?>

<!DOCTYPE html5>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body id="load" onload="load()">
	<script src="script.js"></script>
		<div id="wrapper">
			<?php require_once('nav.php'); ?>
			
			<div id="registerpage">
				<div id="registercard">
					<h2>Register</h2><form action="" method ="post">
					<div id="rlogin"><label>Username </label>
						<input type="text" name="username" autocomplete="off" class="rusername" placeholder="enter username"></div>
						<div id="rlogin"><label>Password </label>
						<input type="password" name="password" class="rpassword" placeholder="enter password"></div>
						<div id="rlogin"><label>Confirm Password </label>
						<input type="password" name="passconf" class="rpassword" placeholder="confirm password"></div>
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
