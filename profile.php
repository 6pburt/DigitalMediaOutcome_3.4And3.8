<?php
//Kicks out logged out users and moves Graham to his admin page
session_start();
if(!isset($_SESSION['login_user'])) {
	header('location: index.php');
}
elseif($_SESSION['login_user'] == "Graham") {
	header('location: index.php');
}
?>

<!-- localhost/musicdb/profile.php-->

<!DOCTYPE html5>
<html>
	<head>
	<!--The meta data for the site. This describes the site to the browser.-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Profile</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="icon" type="image/x-icon" href="images/favicon.ico">
		<meta name="description" content="Graham's music database">
		<meta name="keywords" content="Graham, music, database">
		<meta name="author" content="Pierce Burt">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<!--Calls load() when the body loads-->
	<body id="load" onload="load()">
		<div id="wrapper">
			<?php require_once('nav.php'); 
			$error = null;
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				//Connect.php (tells where to connect servername, username, password, dbaseName)
				require_once('connect.php');
				//username and password sent from form
				$myusername = $_SESSION['login_user'];
				$hashpass = hash('sha256', mysqli_real_escape_string($con, $_POST['password']));
				$sql = "SELECT user_name FROM login WHERE user_name = '$myusername' and `password` = '$hashpass'";
			
				$result = mysqli_query($con,$sql);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				$count = mysqli_num_rows($result);
						
				//If result matched $myusername and $mypassword, table row must be 1 row, therefore will activate the second layer of confirmation
				if($count == 1) {
					require("profiledelete.php");
				} 
				else {
					$error = "Incorrect password";
				}
			}
			?>
			<div id="pheader">
				<!--styled the same way as graham's admin page-->
				<img class="phimg" src="images/headerimg.jpg">
				<div class="phimg"></div>
				<h2 class="phtext">Dashboard</h2>
				<div id="headerquery">
					<div id="profilecnt">
						<!--form where a user can delete their account-->
						<div id="deleteuser">
						<form action="" method ="post">
							<div id="deluserprf"><label>Input password and submit to delete account: </label>
							<input type="password" name="password" class="prfpassword" placeholder="enter password"></div>
							<input id="sublogin" type="submit" value="Submit">
							<p id="error"><?php echo $error;?></p>
						</form>
						</div>
					</div>
				</div><!-- end of content -->
			</div><!-- end of header -->
			<div id="pfooter">
				<p>Copyright Pierce Burt 2020</p>
			</div><!-- end of footer -->
		</div><!-- end of container -->
		<script src="prfscript.js"></script>
	</body>
</html>
