<?php
    session_start();
    require 'security_check_admin.php';
    
    $route = $_SERVER['HTTP_REFERER'];

    $propertyID = filter_input(INPUT_POST,'propertyID',FILTER_SANITIZE_SPECIAL_CHARS);
    $houseNo = filter_input(INPUT_POST,'houseNo',FILTER_SANITIZE_SPECIAL_CHARS);
    $street = filter_input(INPUT_POST,'street',FILTER_SANITIZE_SPECIAL_CHARS);
    $postcode = filter_input(INPUT_POST,'postcode',FILTER_SANITIZE_SPECIAL_CHARS);
    $city = filter_input(INPUT_POST,'city',FILTER_SANITIZE_SPECIAL_CHARS);
    $county = filter_input(INPUT_POST,'county',FILTER_SANITIZE_SPECIAL_CHARS);
    $bedrooms = filter_input(INPUT_POST,'bedrooms',FILTER_SANITIZE_SPECIAL_CHARS);

    $property = GetProperty($PDO, $propertyID);

    
    if (!isset($houseNo) && !isset($street) && !isset($postcode) && !isset($city) && !isset($county) %% !isset($bedrooms))
    {
        Alert("Please Change One Of The Properties Details To Update Them");
        header('Location: '.$route);
    }
    else
    {
        if (empty($houseNo))
            $houseNo = $property['HouseNo'];
        
        if (empty($street))
            $street = $property['Street'];
        
        if (empty($postcode))
            $postcode = $property['Postcode'];
        
        if (empty($city))
            $city = $property['City'];

        if (empty($county))
            $county = $property['County'];

        if (empty($bedrooms))
            $bedrooms = $property['Bedrooms'];
            
            $update = UpdateProperty($PDO, $houseNo, $street, $postcode, $city, $county, $bedrooms, $propertyID);
            if ($update)
            {
                require __DIR__.'/../redirects/redirect_admin.php';
            }
            else
            {
                Alert("Error Updating Property. Property Not Updated");
                header('Location: '.$route);
            }
    }
?>
