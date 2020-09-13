<!-- localhost/musicdb/index.php -->

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
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
	<!--Calls load() when the body loads-->
	<body id="load" onload="load()">
		<div id="wrapper">
		<?php
		//adds login card, nav, and header
		if(!isset($_SESSION['login_user'])) {
			require_once("login.php");
		}
		?>
		<?php require_once('nav.php'); ?>
		<?php require_once('header.php'); ?>
			<!--holds page content-->
			<div id="query">
				<!--formats the content in a grid-->
				<div class="indexqry">
				<?php
					//connect.php (tells where to connect servername, username, password, dbaseName)
					require_once('connect.php');
					
					//create a variable to store sql code for the base song info query with info for song name
					$query = ("SELECT s.id id, s.song_name song, ab.album album, s.duration duration
					FROM song s
					INNER JOIN album ab ON s.album_id = ab.ab_id
					LIMIT 20
					");
					
					//run the query
					$res = mysqli_query($con,$query);
					
					//run query results using a while loop to make a div for each song with all the information in it
						while ($output = mysqli_fetch_array($res))
						{	
							$query3 = ("SELECT a.artist artist
							FROM artist a
							INNER JOIN artist_link al ON a.a_id = al.artist_id
							WHERE song_id = ".$output['id']);

							$res3 = mysqli_query($con,$query3);

							$artist = "";

							while ($output3 = mysqli_fetch_array($res3))
							{
								if($artist == ""){
									$artist = $output3['artist'];
								}
								else{
									$artist = $output3['artist'].", ".$artist;
								}
							}
							//outputs the data and an album cover for each song.
							echo("<div id='box'>"
							.'<div class="albcover">
							<img class="cover" src="album_covers/'.$output['song'].'album cover/'.$output['song'].'album cover_1.jpg" alt="'.$output['song'].' album cover">
							</div>'
							."<div class='song'>"
							."</p>".$output['song']
							."</p><p>By ".$artist
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

		<script src="js/script.js"></script>
	</body>
</html>
