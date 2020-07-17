<!-- localhost/UseThis/01_UsersList.php -->

<!DOCTYPE html>
<html>
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
				<?php
					//connect.php (tells where to connect servername, username, password, dbaseName)
					require_once('connect.php');
					
					//create a variable to store sql code for the 'display all users' query
					$query = ("SELECT * FROM login");
					
					//run the query
					$res = mysqli_query($con,$query);
					echo "<h3><div id = 'usersdiv'>" . "User" . " " . "Password" . "</div></h3>";
					
					//run query results using a while loop
					while ($output = mysqli_fetch_array($res))
					{
						echo "<div id = 'usersdiv'>" . $output['user_id'] . " " . $output['password'] . "</div>";
				//closes the while loop
					}
				?>	
			</div><!-- end of content -->
			<div id="footer">
				<h2>The User List page</h2>
				<p>Tawa</p>
			</div><!-- end of footer -->
		</div><!-- end of container -->
	</body>
</html>
