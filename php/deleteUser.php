<?php
    session_start();
    require 'security_check_admin.php';
    
    $route = $_SERVER['HTTP_REFERER'];
    $staffToDelete = $_GET['userToDelete'];
    $currentlyLoggedIn = $_GET['currentlyLoggedIn'];                                               
    
    if($staffToDelete != $currentlyLoggedIn)
    {
        if (isset($staffToDelete)){
            DeleteUser($PDO, $staffToDelete);
            require __DIR__.'/../redirects/redirect_admin.php';
        }
        else {
            print "Error Deleting account.";
            header('Location: '.$route);    
        }        
    }
    else
    {
        print "Account Trying To Be Deleted Is Current Account Logged In.";
        header('Location: '.$route);    
    }
?>

