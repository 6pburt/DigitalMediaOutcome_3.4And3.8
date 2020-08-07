<html>
	<?php
	require_once("loginrequest.php");
	if($_SERVER['REQUEST_URI'] == '/musicdb/login.php') {
		header('location: index.php');
	}
	?>
	<div id="loginpage" style="<?php if($error==null){echo("display: none;");} else{echo("display: block;");}?>">
		<div id="logincard">
			<h2>Login</h2><img id="loginclose" src="images/cross.png"><form action="" method ="post">
			<div id="login"><label>Username </label>
				<input type="text" name="username" autocomplete="off" class="username" placeholder="enter username"></div>
				<div id="login"><label>Password </label>
				<input type="password" name="password" class="password" placeholder="enter password"></div>
				<input id="sublogin" type="submit" value="Submit">
				<p id="error"><?php echo $error;?></p>
				</div>
			</form>
			</div>
		</div><!-- end of content -->
		<script type="text/javascript">
		<?php 
		if($error==null){echo("document.getElementsByTagName('html')[0].style.overflow = 'auto';");}
		else{echo("document.getElementsByTagName('html')[0].style.overflow = 'hidden';");}
		?>
		</script>
	</body>
</html>
