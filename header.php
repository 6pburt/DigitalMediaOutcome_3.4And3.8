<html>
	<div id="header">
		<img class="himg" src="images/headerimg.jpg">
		<h2 class="htext">Find your favourite songs here</h2>

		<?php
			if(!isset($_SESSION['login_user'])) {
				echo('<h2 class="join"><a href="register.php">Join Now</a></h2>');
			}

			else if(!($_SESSION['login_user'] == "Graham")) {
				echo('<h2 class="join"><a href="profile.php">Your Account</a></h2>');
			}

			else {
				echo('<h2 class="join"><a href="graham.php">Your Account</a></h2>');
			}
		
		?>
	</div><!-- end of header -->
</html>

