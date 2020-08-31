<html>
    <?php
    //kicks user of this page
	if($_SERVER['REQUEST_URI'] == '/musicdb/nav.php') {
		header('location: index.php');
	}
	?>
    <nav>
        <div id = "navcontent">
            <!--nav items-->
            <a class='navlink' href="index.php">HOME</a>
            <a class='navlink' href="browse.php">BROWSE</a>
            <a class='navlink' href="genres.php">GENRES</a>
            <div class="dropdown">
                <!--dropdown items-->
                <p class="dropdownitem">ACCOUNT</p>
                <div class="dropdown1">
                    <?php
                        //Changes the nav for: Register page, logged out user, logged in user, and graham
                        if($_SERVER['REQUEST_URI'] == '/musicdb/register.php'){
                            echo("<a class='navlink' id='loginopen' href='loginpage.php'>LOGIN</a><a class='navlink' href='register.php'>REGISTER</a>");
                        }
                        else if(!isset($_SESSION['login_user'])) {
                            echo("<a class='navlink' id='loginopen' href='#wrapper'>LOGIN</a><a class='navlink' href='register.php'>REGISTER</a>");
                        }
                        else if($_SESSION['login_user'] == "Graham") {
                            echo("<a class='navlink' href='logout.php'>LOG OUT</a><a class='navlink' href='graham.php'>ADMIN</a>");
                        }
                        else{
                            echo("<a class='navlink' href='logout.php'>LOG OUT</a><a class='navlink' href='profile.php'>PROFILE</a>");
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>