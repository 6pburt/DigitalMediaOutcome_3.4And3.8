<html>
    <nav>
        <div id = "navcontent">
            <a class='navlink' href="index.php">HOME</a>
            <a class='navlink' href="browse.php">BROWSE</a>
            <a class='navlink' href="genres.php">GENRES</a>
            <div class="dropdown">
                <p class="dropdownitem">ACCOUNT</p>
                <div class="dropdown1">
                    <?php
                        session_start();
                        if(!isset($_SESSION['login_user'])) {
                            echo("<a class='navlink' href='login.php'>LOGIN</a><a class='navlink' href='register.php'>REGISTER</a>");
                        }
                        else{
                            echo("<a class='navlink' href='logout.php'>LOG OUT</a><a class='navlink' href='account.php'>ACCOUNT</a>");
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>