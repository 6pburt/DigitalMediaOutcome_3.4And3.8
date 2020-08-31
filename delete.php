<?php 
    session_start();

    //Kicks out users if they use this as a page
    if(!isset($_SESSION['login_user'])) {
        header('location: index.php');
    }

    //gets form results
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //Connect.php (tells where to connect servername, username, password, dbaseName)
        require_once('connect.php');
        //username and password sent from form. Password hashed. sql query to check user made
        $myusername = $_SESSION['login_user'];
        $hashpass = hash('sha256', mysqli_real_escape_string($con, $_POST['password']));
        $sql = "SELECT user_name FROM login WHERE user_name = '$myusername' and `password` = '$hashpass'";

        //runs query
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
                
        //If result matched $myusername and $mypassword, table row must be 1 row
        if($count == 1) {
            $sql2 = "DELETE FROM login WHERE user_name = '$myusername' and `password` = '$hashpass'";
            mysqli_query($con,$sql2);
            session_destroy();
            header('location: index.php');
        } 
        else {
            $error = "Incorrect password";
            header('location: profile.php');
        }
    }
?>