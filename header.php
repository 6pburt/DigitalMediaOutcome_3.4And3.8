<html>
	<?php
	//kicks out users from this page
	if($_SERVER['REQUEST_URI'] == '/musicdb/header.php') {
		header('location: index.php');
	}
	?>
	<div id="header">
		<!--background image-->
		<img class="himg" src="images/headerimg.jpg">

		<?php
			//three headers for: Not logged in, logged in, and graham
			if(!isset($_SESSION['login_user'])) {
				echo('<h2 class="join"><a href="register.php">Join Now</a></h2>');
				echo('<h2 class="htext">Find your favourite songs here</h2>');
			}

			else if(!($_SESSION['login_user'] == "Graham")) {
				echo('<h2 class="join"><a href="profile.php">Your Account</a></h2>');
				echo('<h2 class="htext">Welcome Back '.ucwords($_SESSION['login_user']).'!</h2>');
			}

			else {
				echo('<h2 class="join"><a href="graham.php">Your Account</a></h2>');
				echo('<h2 class="htext">Welcome Back '.ucwords($_SESSION['login_user']).'!</h2>');
			}
		
		?>
	</div><!-- end of header -->
</html>

