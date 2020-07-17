<!-- localhost/UseThis/06_UpdateUser.php-->

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UpdateUser</title>
<link rel="stylesheet" type="text/css" href="Styles.css">
</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>Use this form to update a user in the sql database</h1>
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
				
				 <form method="post" name="input" action="06_UpdateUser.php" > 
				ExistingUser Name:<br/> <input name="ExistingUserName" type="text"/><br/>
				New User Name:<br/> <input name="NewUserName" type="text"/><br/>
				<input type="submit" name="submit" value="Update" /> </form>
				
				<?php
					//connect.php (tells where to connect servername, username, password, dbaseName)
					require_once('connect.php');
					print "<h3>Connected to server</h3>\n";
					
				$ExistingUserID = $_POST['ExistingUserName']; 
				$NewUserID = $_POST['NewUserName']; 
					
					//create a variable to store sql code for the 'Add Users' query
					$updatequery = "UPDATE login SET user_id = '$NewUserID' WHERE user_id = '$ExistingUserID'";
					if (mysqli_query($con,$updatequery))
					{
					echo "<h3>Record updated</h3>";
					}
					else
					{
					echo "<h3>Error updating record:</h3> ";
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
