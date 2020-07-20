<html>
    <nav>
        <div id = "navcontent">
            <a class='navlink' href="index.php">Home</a>
            <a class='navlink' href="browse.php">Browse</a>
            <a class='navlink' href="genres.php">Genres</a>
            <div class="dropdown">
                <p class="dropdownitem">Account</p>
                <div class="dropdown1">
                    <?php
                        session_start();
                        if(!isset($_SESSION['login_user'])) {
                            echo("<a class='navlink' href='login.php'>Login</a><a class='navlink' href='register.php'>Register</a>");
                        }
                        else{
                            echo("<a class='navlink' href='logout.php'>Log Out</a><a class='navlink' href='account.php'>Account</a>");
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>