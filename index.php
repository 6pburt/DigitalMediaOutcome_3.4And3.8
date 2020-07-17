<!-- localhost/UseThis/01_UsersList.php -->

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>UserList</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body>
		<div id="wrapper">
		<?php require_once('nav.php'); ?>
			<div id="header">
				<h1>DISPLAYS THE LIST OF USERS</h1>
			</div><!-- end of header -->
			<?php require_once('nav.php'); ?>
	
			<div id="content">
				<?php
					//connect.php (tells where to connect servername, username, password, dbaseName)
					require_once('connect.php');
					
					//create a variable to store sql code for the 'display all users' query
					$query = ("SELECT s.song_name song, ab.album album, s.duration duration, a.artist artist, g.genre genre
					FROM song s
					INNER JOIN album ab ON s.album_id = ab.ab_id
					INNER JOIN artist_link al ON s.id = al.song_id
					INNER JOIN artist a ON al.artist_id = a.a_id
					INNER JOIN genre_link gl ON s.id = gl.song_id
					INNER JOIN genre g ON gl.genre_id = g.g_id");
					
					//run the query
					$res = mysqli_query($con,$query);
					echo "<h3><div id = 'usersdiv'>" . "User" . " " . "Password" . "</div></h3>";
					
					//run query results using a while loop
					while ($output = mysqli_fetch_array($res))
					{	
						$dur = $output['duration'];
						echo("<div id = 'usersdiv'>"
						."<div class='output'>".$output['song']."</div>"
						."<div class='output'>".$output['album']."</div>"
						."<div class='output'>".(($dur - $dur % 60) / 60).":".($dur % 60)."</div>"
						."<div class='output'>".$output['artist']."</div>"
						."<div class='output'>".$output['genre']."</div>"
						."</div>");
				//closes the while loop
					}
				?>	
			</div><!-- end of content -->
			<div id="footer">
				<p>Copyright Pierce Burt 2020</p>
			</div><!-- end of footer -->
		</div><!-- end of container -->
	</body>
</html>
