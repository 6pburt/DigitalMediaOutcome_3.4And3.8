<!-- localhost/musicdb/connect.php -->

<!--
The following data is used to connect to the sql database.
servername: localhost
username: pburt
password: dojustly01
dbaseName: musicdb
-->

<?php
	//connection variable (tells where to connect servername, username, password, dbaseName)
	$con = mysqli_connect("localhost","pburt","dojustly01","musicdb");
	// Check connection
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>	
