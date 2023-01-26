<?php
    session_start();
    require 'security_check_admin.php';
    
    $route = $_SERVER['HTTP_REFERER'];

    $houseNo = filter_input(INPUT_POST,'houseNo',FILTER_SANITIZE_SPECIAL_CHARS);
    $street = filter_input(INPUT_POST,'street',FILTER_SANITIZE_SPECIAL_CHARS);
    $postcode = filter_input(INPUT_POST,'postcode',FILTER_SANITIZE_SPECIAL_CHARS);
    $city = filter_input(INPUT_POST,'city',FILTER_SANITIZE_SPECIAL_CHARS);
    $county = filter_input(INPUT_POST,'county',FILTER_SANITIZE_SPECIAL_CHARS);
    $bedrooms = filter_input(INPUT_POST,'bedrooms',FILTER_SANITIZE_SPECIAL_CHARS);

    if (!isset($houseNo) || !isset($street) || !isset($postcode) || !isset($city) || !isset($county) || !isset($bedrooms)){
        alert("Please Fill In All Required Details Marked With An *");
        header('Location: '.$route);       
    }
    else {        
        $create = CreateNewProperty($PDO, $houseNo, $street, $postcode, $city, $county, $bedrooms);
        if ($create)
        {
            require __DIR__.'/../redirects/redirect_admin.php';
        }
        else
        {
            alert("Error Creating Property, Please Try Again");
            print "Error creating account.";
            header('Location: '.$route);
        }     
    }
?>
