<!-- localhost/musicdb/connect.php -->

<?php
	if($_SERVER['REQUEST_URI'] == '/musicdb/connect.php') {
		header('location: index.php');
	}
	//connection variable (tells where to connect servername, username, password, dbaseName)
	$con = mysqli_connect("localhost","pburt","dojustly01","musicdb");
	// Check connection
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>	
