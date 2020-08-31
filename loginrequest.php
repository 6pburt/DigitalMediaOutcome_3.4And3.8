<?php
	session_start();
	//kicks user off of this page
	if($_SERVER['REQUEST_URI'] == '/musicdb/loginrequest.php') {
		header('location: index.php');
	}
	$error = null;
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//Connect.php (tells where to connect servername, username, password, dbaseName)
		require_once('connect.php');
		//username and password sent from form
		$myusername = mysqli_real_escape_string($con, $_POST['username']);
		$hashpass = hash('sha256', mysqli_real_escape_string($con, $_POST['password']));
		$sql = "SELECT user_name FROM login WHERE user_name = '$myusername' and `password` = '$hashpass'";

		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				
		$count = mysqli_num_rows($result);
				
		//If result matched $myusername and $mypassword, table row must be 1 row
		if($count == 1) {
			$_SESSION['login_user'] = $myusername;
        } 
        else {
			$error = "Your login name or password is invalid";
			}
			
	}
?>