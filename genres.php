<!-- localhost/musicdb/genres.php -->

<!DOCTYPE html>
<html>
	<head>
	<!--The meta data for the site. This describes the site to the browser.-->
		<meta charset="ISO-8859-1">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<meta name="description" content="Graham's music database">
		<meta name="keywords" content="Graham, music, database">
		<meta name="author" content="Pierce Burt">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Genres</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	</head>
	<!--Calls load() when the body loads-->
	<body id="load" onload="load()">
		<div id="wrapper">
		<!--Adds login card, nav and header to page-->
		<?php
		if(!isset($_SESSION['login_user'])) {
			require_once("login.php");
		}
		?>
		<?php require_once('nav.php'); ?>
		<?php require_once('header.php'); ?>
			
			<!--holds the content of the page (what genres the database has)-->
			<div id="query">
				<div class="genreqry">
				<?php
					//connect.php (tells where to connect servername, username, password, dbaseName)
					require_once('connect.php');
					
					//create a variable to store sql code for the 'display all genres' query
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
		<!--script for login card, load animation-->
		<script src="js/script.js"></script>
	</body>
</html>
