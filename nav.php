<html>
    <nav>
        <ul id = "navcontent">
            <li><a href="index.php">Home</a></li>
            <li><a href="browse.php">Browse</a></li>
            <li><a href="genres.php">Genres</a></li>
            <div class="dropdown">
                <ul class="dropdown">
                    <li>Account</li>
                    <?php
                        session_start();
                        if(!isset($_SESSION['login_user'])) {
                            echo("<li><a href='login.php'>Login</a></li><li><a href='register.php'>Register</a></li>");
                        }
                        else{
                            echo("<li><a href='logout.php'>Log Out</a></li><li><a href='account.php'>Account</a></li>");
                        }
                    ?>
                </ul>
            </div>
        </ul>
    </nav>
</html>