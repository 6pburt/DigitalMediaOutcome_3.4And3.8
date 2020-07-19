<!-- localhost/UseThis/02_UserListStyled.php -->

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Users</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id = 'navigation'>
		<?php require_once('nav.php'); ?>
	<div id = 'wrapper'>
	<h1>USERS</h1>
		<div id = 'container'>
			<?php
				//connect.php (tells where to connect servername, username, password, dbaseName)
				require_once('connect.php');
				
				//create a variable to store sql code for the 'display all users' query
				$query = ("SELECT * FROM login");
				
				//run the query
				$res = mysqli_query($con,$query);
				
				
				//run query results using a while loop
				while ($output = mysqli_fetch_array($res))
				{
					echo "<div id = 'usersdiv'>" . $output['user_id'] . "</div>";
					echo "<div id = 'passworddiv'>" . $output['password'] . "</div>";
			//closes the while loop
				}
				
			?>	
		</div>
	</div>
</body>
</html>