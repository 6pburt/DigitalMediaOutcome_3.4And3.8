
<?php
//Starts session, makes an error variable and kicks the user off the page if they are logged in already.
session_start();
$error = null;
if(isset($_SESSION['login_user'])) {
	header('location: index.php');
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
	//Connect.php (tells where to connect servername, username, password, dbaseName)
	require_once('connect.php');
	//username and password sent from form. Password is hashed and so is the confirmation password to then store securely.
	$myusername = mysqli_real_escape_string($con, $_POST['username']);
	$hashpass = hash('sha256', mysqli_real_escape_string($con, $_POST['password']));
	$hashconf = hash('sha256', mysqli_real_escape_string($con, $_POST['passconf']));
	
	// checks if the password and the confirmation match each other
	if($hashpass == $hashconf) {
		//Runs a query to see if the user exists and stores the amount of rows in $count (1 means there is an existing user)
		$sql = "SELECT user_name FROM login WHERE user_name = '$myusername'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
						
		//If there is a user, table must be 1 row
		if($count == 1) {
			$error = "Your login name is taken";
		} 

		//Checks if the user name is less than 15
		elseif(strlen($myusername) > 15) {
			$error = "Please enter a Username no longer than 15 characters.";
		}

		else {
			//Checks if fields are blank
			if($myusername != "" and $_POST['password'] != ""){
				//Registers the user if possible
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
			else{
				$error = "Username and password fields must be filled";
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
	<!--The meta data for the site. This describes the site to the browser.-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Register</title>
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
			<!--Adds the nav to the page-->
			<?php require_once('nav.php'); ?>
			
			<!--Page content-->
			<div id="registerpage">
				<!--Register card in the center of the page-->
				<div id="registercard">
					<h2>Register</h2>
					<!--Form. Divs hold individual fields-->
					<form action="" method ="post">
						<div id="rlogin">
							<label>Username </label>
							<input type="text" name="username" autocomplete="off" class="rusername" placeholder="enter username">
						</div>
						<div id="rlogin">
							<label>Password </label>
							<input type="password" name="password" class="rpassword" placeholder="enter password">
						</div>
						<div id="rlogin">
							<label>Confirm Password </label>
							<input type="password" name="passconf" class="rpassword" placeholder="confirm password">
						</div>
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
