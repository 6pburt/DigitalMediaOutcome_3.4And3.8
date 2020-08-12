<html>
	<?php
	if($_SERVER['REQUEST_URI'] == '/musicdb/profiledelete.php') {
		header('location: index.php');
	}
	?>
	<div id="prfdelpage" onload="openDelForm()">
		<div id="prfdelcard">
			<h2>Confirm Password</h2><img id="prfdelclose" src="images/cross.png">
			<form action="delete.php" method ="post">
				<div id="login"><label>Confirm </label>
				<input type="password" name="password" class="password" placeholder="enter password"></div>
				<input id="sublogin" type="submit" value="Submit">
				<p id="error"><?php echo $error;?></p>
			</form>
			<p id="error"><?php echo $error;?></p>
		</div>
	</div><!-- end of content -->
	<script type="text/javascript">
	<?php 
	if($error==null){echo("document.getElementsByTagName('html')[0].style.overflow = 'auto';");}
	else{echo("document.getElementsByTagName('html')[0].style.overflow = 'hidden';");}
	?>
	</script>
</html>