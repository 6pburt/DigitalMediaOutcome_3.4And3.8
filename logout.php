<?php
//logs out user
if(session_id() == ''){
    session_start();
}
if(session_destroy()){
    header("Location:index.php");
}
?>