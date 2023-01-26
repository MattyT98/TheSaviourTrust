<?php
    require("../database/database_interface.php"); //Connect to database and gather interface functions.

    if (isset($_SESSION['Username'])){
        $username = $_SESSION['Username'];
        VerifySession($PDO,$username);
    }
    else
    {
        $route = "../index.php";
        header("Location: $route");
    }
?>