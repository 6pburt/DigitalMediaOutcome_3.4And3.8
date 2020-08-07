<!-- localhost/musicdb/index.php -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Genres</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body id="load" onload="load()">
		<div id="wrapper">
		<?php
		if(!isset($_SESSION['login_user'])) {
			require_once("login.php");
		}
		?>
		<?php require_once('nav.php'); ?>
		<?php require_once('header.php'); ?>
			
	
			<div id="query">
				<div class="genreqry">
				<?php
					//connect.php (tells where to connect servername, username, password, dbaseName)
					require_once('connect.php');
					
					//create a variable to store sql code for the 'display all users' query
					$query = ("SELECT genre
					FROM genre
					");
					
					//run the query
					$res = mysqli_query($con,$query);
					
					//run query results using a while loop
						while ($output = mysqli_fetch_array($res))
						{	
							echo("
							<div id='genrecontainer'>"
							.'<div class="genrebox"><img class="genreimg" src="genre_images/'.$output['genre'].'.jpg" alt="'.$output['genre'].' music">
							</div>'
							."<div class='genre'><p>".$output['genre']
							."</p></div></div>");

				//closes the while loop
					}
				?>	
			</div>
			</div><!-- end of content -->
			<div id="footer">
				<p>Copyright Pierce Burt 2020</p>
			</div><!-- end of footer -->
		</div><!-- end of container -->
		<script src="script.js"></script>
	</body>
</html>
