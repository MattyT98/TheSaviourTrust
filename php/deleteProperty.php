<?php
    session_start();
    require 'security_check_admin.php';
    
    $route = $_SERVER['HTTP_REFERER'];
    $PropertyToDelete = $_GET['propertyToDelete'];                                              
    
    if (isset($PropertyToDelete)){
        DeleteProperty($PDO, $PropertyToDelete);
        require __DIR__.'/../redirects/redirect_admin.php';
    }
    else {
        print "Error Deleting Property.";
        header('Location: '.$route);    
    }
?>

