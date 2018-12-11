<?php
session_start();
unset($_SESSION["user_login"]);
unset($_SESSION["user_pass"]);
header("Location:login.php");
?>
<?php
    session_start();
    $_SESSION = array();
    session_destroy();
?>