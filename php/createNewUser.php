<?php
    session_start();
    require 'security_check_admin.php';
    
    $route = $_SERVER['HTTP_REFERER'];

    $firstname = filter_input(INPUT_POST,'forename',FILTER_SANITIZE_SPECIAL_CHARS);
    $surname = filter_input(INPUT_POST,'surname',FILTER_SANITIZE_SPECIAL_CHARS);
    $pass = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
    $staffType = $_POST['staffType'];
    $admin = $_POST['adminPermission'];
    $pass = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);

    $hashPass = password_hash($pass,PASSWORD_DEFAULT);

    if (!isset($firstname) || !isset($surname) || !isset($pass) || !isset($staffType) || !isset($admin)){
        alert("Please Fill In All Required Details Marked With An *");
        header('Location: '.$route);

    }
    else {
        if ($hashPass){
            $create = CreateNewUser($PDO, $firstname, $surname, $hashPass, $admin, $staffType);
            if ($create)
            {
                require __DIR__.'/../redirects/redirect_admin.php';
            }
            else
            {
                print "Error creating account.";
                header('Location: '.$route);
            }
        }        
    }
?>
