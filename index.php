<!-- localhost/musicdb/index.php -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel='icon' href='images/favicon.ico' type='image/x-icon'/ >
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
							$dur = $output['duration'];
							if(strlen(strval(($dur % 60))) == 2) {
							$durval = (($dur - $dur % 60) / 60).":".strval(($dur % 60));}
							elseif(strlen(strval(($dur % 60))) == 1) {
								$durval = (($dur - $dur % 60) / 60).":0".strval(($dur % 60));}
							elseif(strlen(strval(($dur % 60))) == 0) {
								$durval = (($dur - $dur % 60) / 60).":00".strval(($dur % 60));}

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
