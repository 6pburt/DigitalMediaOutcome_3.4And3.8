<!-- localhost/musicdb/index.php -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body id="load" onload="load()">
		<div id="wrapper">
		<?php require_once("login.php");?>
		<?php require_once('nav.php'); ?>
			<div id="header">
				<img class="himg" src="images/headerimg.jpg">
				<h2 class="htext">Find your favourite songs here</h2>
				<h2 class="join"><a href="register.php">Join Now</a></h2>
			</div><!-- end of header -->
			<?php require_once('nav.php'); ?>
	
			<div id="query">
			<div id="row" class="titles">
				<div class='output'>Song Name</div>
				<div class='output'>Album Name</div>
				<div class='output'>Duration</div>
				<div class='output'>Artist(s)</div>
				<div class='output'>Genre(s)</div>
			</div>
				<?php
					//connect.php (tells where to connect servername, username, password, dbaseName)
					require_once('connect.php');
					
					//create a variable to store sql code for the 'display all users' query
					$query = ("SELECT s.id id, s.song_name song, ab.album album, s.duration duration
					FROM song s
					INNER JOIN album ab ON s.album_id = ab.ab_id
					ORDER BY song asc
					");
					
					//run the query
					$res = mysqli_query($con,$query);
					
					//run query results using a while loop
						while ($output = mysqli_fetch_array($res))
						{	
							$dur = $output['duration'];
							if(strlen(strval(($dur % 60))) == 2) {
							$durval = (($dur - $dur % 60) / 60).":".strval(($dur % 60));}
							elseif(strlen(strval(($dur % 60))) == 1) {
								$durval = (($dur - $dur % 60) / 60).":0".strval(($dur % 60));}
							elseif(strlen(strval(($dur % 60))) == 0) {
								$durval = (($dur - $dur % 60) / 60).":00".strval(($dur % 60));}
							
							$query2 = ("SELECT g.genre genre
							FROM genre g
							INNER JOIN genre_link gl ON g.g_id = gl.genre_id
							WHERE song_id = ".$output['id']);

							$query3 = ("SELECT a.artist artist
							FROM artist a
							INNER JOIN artist_link al ON a.a_id = al.artist_id
							WHERE song_id = ".$output['id']);

							$res2 = mysqli_query($con,$query2);
							$res3 = mysqli_query($con,$query3);

							$genre = "";
							$artist = "";
							
							while ($output2 = mysqli_fetch_array($res2))
							{
								if($genre == ""){
									$genre = $output2['genre'];
								}
								else{
									$genre = $output2['genre'].", ".$genre;
								}
							}

							while ($output3 = mysqli_fetch_array($res3))
							{
								if($artist == ""){
									$artist = $output3['artist'];
								}
								else{
									$artist = $output3['artist'].", ".$artist;
								}
							}

							echo("<div id='row'>"
							."<div class='output'>".$output['song']."</div>"
							."<div class='output'>".$output['album']."</div>"
							."<div class='output'>".$durval."</div>"
							."<div class='output'>".$artist."</div>"
							."<div class='output'>".$genre."</div>"
							."</div>");
				//closes the while loop
					}
				?>	
			</div><!-- end of content -->
			<div id="footer">
				<p>Copyright Pierce Burt 2020</p>
			</div><!-- end of footer -->
		</div><!-- end of container -->
		<script src="script.js"></script>
	</body>
</html>
