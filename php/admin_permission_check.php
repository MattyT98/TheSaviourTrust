<?php
    session_start();
    require("../database/database_interface.php"); //Connect to database and gather interface functions.
    $route = $_SERVER['HTTP_REFERER'];
    $username = $_SESSION['Username'];
    VerifyAdminPermissions($PDO, $username, $route);   
?>