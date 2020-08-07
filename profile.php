<?php
session_start();
if(!isset($_SESSION['login_user'])) {
	header('location: index.php');
}
elseif($_SESSION['login_user'] == "Graham") {
	header('location: graham.php');
}
?>

<!-- localhost/UseThis/05_DeleteUser.php-->

<!DOCTYPE html5>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body>
		<div id="wrapper">
		<?php require_once('nav.php'); ?>
		<?php require_once('profileheader.php'); ?>
			<div id="content">
				<img src="Jellyfish.jpg" alt="Just another broken image link" title="An image for an images sake" width="560px" />
				
				 <form method="post" name="input" action="05_DeleteUser.php" > 
				User Name:<br/> <input name="UserName" type="text"/><br/>
				<input type="submit" name="submit" value="Delete" /> </form>
				
				<?php
					//connect.php (tells where to connect servername, username, password, dbaseName)
					require_once('connect.php');
					print "<h3>Connected to server</h3>\n";
					
				$UserID = $_POST['UserName']; 
					
					//create a variable to store sql code for the 'Add Users' query					
					$deletequery = "DELETE FROM login WHERE user_id = '$UserID'";

					if (mysqli_query($con,$deletequery))
					{
					echo "<h3>Record deleted</h3>";
					}
					else
					{
					echo "<h3>Error deleting record:</h3> ";
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
