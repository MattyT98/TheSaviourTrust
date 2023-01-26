<?php
    session_start();
    require("../database/database_interface.php"); //Connect to database and gather interface functions.

    $u = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
    $p = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);

    if (!isset($u) || !isset($p)){
        require __DIR__.'/../redirects/redirect_index.php';
    }
    else
        VerifyLogin($PDO, $u, $p);
?>