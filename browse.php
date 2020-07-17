<!-- localhost/UseThis/03_UserListTable.php-->

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserListTable</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>How to output the users using a table format</h1>
			</div><!-- end of header -->
			<?php require_once('nav.php'); ?>
			<div id="content">
				<img src="Jellyfish.jpg" alt="Just another broken image link" title="An image for an images sake" width="560px" />
				
				<?php
					//connect.php (tells where to connect servername, username, password, dbaseName)
					require_once('connect.php');
					print "<h3>Connected to server</h3>\n";
					
					$query=("SELECT * FROM login"); //create query
					
					$res=mysqli_query($con,$query); //run query
					
					//starts the table
					echo "<table>";	
					//loops to give all queries data
					echo "<tr>";//table row starts
					echo "<td>";//table column 1 starts
					print "<h3>user_id</h3>";
					echo "</td>";
					echo "<td>";//table column 2 starts 
					print "<h3>password</h3>";
					echo "</td>";					
					while ($output=mysqli_fetch_array($res)) 
					{//this infermation continues for the loop count
					echo "<tr>";//table row starts
					echo "<td>";//table column 1 starts
					echo $output["user_id"];
					echo "</td>";
					echo "<td>";//table column 2 starts 
					echo $output["password"];
					echo "</td>";
					echo "</tr>";//table row finishes
					}// The loop finishes
					echo "</table>";//table closes
				?>

			</div><!-- end of content -->
			<div id="footer">
				<h2>The User List in a tabulated format</h2>
				<p>Tawa</p>
			</div><!-- end of footer -->
		</div><!-- end of container -->
	</body>
</html>
