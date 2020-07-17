<html>
    <nav>
        <div id = "navcontent">
            <a class="navlink" href="index.php">HOME</a>
            <a class="navlink" href="browse.php">BROWSE</a>
            <a class="navlink" href="genres.php">GENRES</a>
            <div class="navlink"> </div>
            <div class="dropdown">
                <p class="navlink">ACCOUNT</li>
                <div class="dropdown1">
                <?php
                    session_start();
                    if(!isset($_SESSION['login_user'])) {
                        echo("<a class='dropdownitem' href='login.php'>LOGIN</a><a class='dropdownitem' href='register.php'>REGISTER</a></li>");
                    }
                    else{
                        echo("<a class='dropdownitem' href='logout.php'>LOG OUT</a><a class='dropdownitem' href='account.php'>ACCOUNT</a></li>");
                    }
                ?>
                </div>
            </div>
        </ul>
    </nav>
</html>