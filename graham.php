<?php
session_start();
if(!isset($_SESSION['login_user'])) {
	header('location: index.php');
}
elseif(!($_SESSION['login_user'] == "Graham")) {
	header('location: index.php');
}
?>

<!-- localhost/UseThis/06_UpdateUser.php-->

<!DOCTYPE html5>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Profile</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body id="load" onload="load()">
		<div id="wrapper">
			<?php require_once('nav.php'); ?>
			<div id="pheader">
				<img class="phimg" src="images/headerimg.jpg">
				<div class="phimg"></div>
				<h2 class="phtext">Dashboard</h2>
				<div id="headerquery">
					<div id="profilecnt">
						<h2 id="duration">Total Song Duration:
							<?php
								require_once('connect.php');
								$query = ("SELECT s.duration duration FROM song s");
								$res = mysqli_query($con,$query);
								$totaldur = 0;
								while ($output = mysqli_fetch_array($res)){
									$totaldur += $output['duration'];
								}
								$totaldur = gmdate("H:i:s", $totaldur);
								echo($totaldur);
							?>
						</h2>

						<div id="deleteuser">
							<h2>Current User profiles:</h2>
							<?php
								$query2 = ("SELECT l.user_name user_name FROM `login` l");
								$res2 = mysqli_query($con,$query2);
								while ($output = mysqli_fetch_array($res2)){
									echo("<p id='user'>".$output['user_name']."</p>");
								}

								$error = null;
								if($_SERVER["REQUEST_METHOD"] == "POST") {
									//Connect.php (tells where to connect servername, username, password, dbaseName)
									require_once('connect.php');
									//username and password sent from form
									$user = mysqli_real_escape_string($con, $_POST['username']);
									$sql = "SELECT user_name FROM login WHERE user_name = '$user'";
									$result = mysqli_query($con,$sql);
									$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
									$count = mysqli_num_rows($result);
					
									//If result matched $myusername and $mypassword, table row must be 1 row
									if($user == "Graham"){
										$error = "You cannot delete administrator accounts";
									}
									else if($count == 1) {
										$sql2 = "DELETE FROM login WHERE user_name = '$user'";
										$result = mysqli_query($con,$sql2);
										$error = "User ".$user." has been deleted";
									} 
									else {
										$error = "There are no users with that username.";
									}
								}
							?>
							<form action="" method ="post">
								<div class="duser"><label>Input a username to delete: </label>
								<input type="text" name="username" autocomplete="off" class="dusername" placeholder="enter username"></div>
								<input id="dsublogin" type="submit" value="Submit">
								<p id="error"><?php echo $error;?></p>
							</form>
						</div>
					</div>
				</div><!-- end of content -->
			</div><!-- end of header -->
			<div id="pfooter">
				<p>Copyright Pierce Burt 2020</p>
			</div><!-- end of footer -->
		</div><!-- end of container -->
		<script src="script.js"></script>
	</body>
</html>
