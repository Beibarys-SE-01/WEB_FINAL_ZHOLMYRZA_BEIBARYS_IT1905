<?php
//signout
session_start();
unset($_SESSION['user']);
session_unset();
session_destroy();
header("Location: HomePage.php");
?>