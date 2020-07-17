<!-- localhost/UseThis/04_AddUser.php-->

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AddUser</title>
<link rel="stylesheet" type="text/css" href="Styles.css">
</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>Use this form to add users to the sql database</h1>
			</div><!-- end of header -->
			<div id="navigation">
				<a href="login.php">login.php</a> 
				<a href="01_UsersList.php">01_UsersList.php</a> 
				<a href="02_UserListStyled.php">02_UserListStyled.php</a> 
				<a href="03_UserListTable.php">03_UserListTable.php</a> 
				<a href="04_AddUser.php">04_AddUser.php</a> 
				<a href="05_DeleteUser.php">05_DeleteUser.php</a> 
				<a href="06_UpdateUser.php">06_UpdateUser.php</a>
			</div><!-- end of navigation -->
			<div id="content">
				<img src="Jellyfish.jpg" alt="Just another broken image link" title="An image for an images sake" width="560px" />
				
				 <form method="post" name="input" action="04_AddUser.php" > 
				User Name:<br/> <input name="UserName" type="text"/><br/> 
				Password:<br/> <input name="Password" type="text"/><br/> 
				<input type="submit" name="submit" value="insert" /> </form>
				
				<?php
					//connect.php (tells where to connect servername, username, password, dbaseName)
					require_once('connect.php');
					print "<h3>Connected to server</h3>\n";
					
				$UserID = $_POST['UserName']; 
				$PW = $_POST['Password'];
					
					//create a variable to store sql code for the 'Add Users' query
					$insertquery = "INSERT INTO login( user_id, password ) VALUES(  '$UserID', '$PW' )";
					
					if (mysqli_query($con,$insertquery))
					{
					echo "<h3>Record inserted</h3>";
					}
					else
					{
					echo "<h3>Error inserting record:</h3> ";
					}
				?>
			</div><!-- end of content -->
			<div id="footer">
				<h2>The Add User page</h2>
				<p>Tawa</p>
			</div><!-- end of footer -->
		</div><!-- end of container -->
	</body>
</html>
