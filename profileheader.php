<html>
	<?php
	if($_SERVER['REQUEST_URI'] == '/musicdb/profileheader.php') {
		header('location: profile.php');
	}
	?>
	<div id="header">
		<img class="himg" src="images/headerimg.jpg">
		<h2 class="htext">Welcome <?php echo(ucwords($_SESSION['login_user']));?></h2>
		<h2 class="join"><a href="#content"><img id="arrow" src="images/arrow.png"></a></h2>
	</div><!-- end of header -->
</html>
