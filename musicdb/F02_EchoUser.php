<?php
	session_start();
	if(!isset($_SESSION['login_user'])) {
		header("location: login.php");
	}
	else{
		$User = $_SESSION['login_user'];
	}
?>
<head>
<title>Users</title>
<link rel="stylesheet" type="text/css" href="UserListStyled.css">
</head>
<body>
	<div id = 'navigation'>
		<a href="login.php">login.php</a> 
				<a href="01_UsersList.php">01_UsersList.php</a> 
				<a href="02_UserListStyled.php">02_UserListStyled.php</a> 
				<a href="03_UserListTable.php">03_UserListTable.php</a> 
				<a href="04_AddUser.php">04_AddUser.php</a> 
				<a href="05_DeleteUser.php">05_DeleteUser.php</a> 
				<a href="06_UpdateUser.php">06_UpdateUser.php</a>
	</div><!-- end of navigation -->
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
					$query2 = ("SELECT password FROM login WHERE user_id = '" . $output['user_id']."'");
					$res2 = mysqli_query($con,$query2);
					while($output2 = mysqli_fetch_array($res2)){
						echo "<div id = 'passworddiv'>" . $output2['password'] . "</div>";
					}
			//closes the while loop
				}
				
			?>	
		</div>
	</div>
</body>
</html>


<!-- localhost/UseThis/02_UserListStyled.php -->

