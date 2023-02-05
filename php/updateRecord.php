<?php
    session_start();
    require 'security_check_admin.php';
    
    $route = $_SERVER['HTTP_REFERER'];

    $recordID = filter_input(INPUT_POST,'recordID',FILTER_SANITIZE_SPECIAL_CHARS);
    $propertyID = filter_input(INPUT_POST,'propertyID',FILTER_SANITIZE_SPECIAL_CHARS);
    $hallwayNotes = filter_input(INPUT_POST,'hallwayNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $kitchenNotes = filter_input(INPUT_POST,'kitchenNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $livingRoomNotes = filter_input(INPUT_POST,'livingRoomNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $stairsAndLandingNotes = filter_input(INPUT_POST,'stairsAndLandingNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $bathroomNotes = filter_input(INPUT_POST,'bathroomNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $toiletNotes = filter_input(INPUT_POST,'toiletNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $anyTenantsPresent = filter_input(INPUT_POST,'anyTenantsPresent',FILTER_SANITIZE_SPECIAL_CHARS);
    $tenantsPresent = filter_input(INPUT_POST,'tenantsPresent',FILTER_SANITIZE_SPECIAL_CHARS);    
    $tenantRoomNotes = filter_input(INPUT_POST,'tenantRoomNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $smokeAlarmNotes = filter_input(INPUT_POST,'smokeAlarmNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $applianceNotes = filter_input(INPUT_POST,'applianceNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $extraNotes = filter_input(INPUT_POST,'extraNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $timeSubmitted = filter_input(INPUT_POST,'timeSubmitted',FILTER_SANITIZE_SPECIAL_CHARS);
    $submittedBy = filter_input(INPUT_POST,'submittedBy',FILTER_SANITIZE_SPECIAL_CHARS);

    $property = GetProperty($PDO, $propertyID);

    
    if (!isset($recordID) && !isset($propertyID) && !isset($toiletNotes) && !isset($anyTenantsPresent) && !isset($timeSubmitted) && !isset($submittedBy))
    {
        Alert("Please Change One Of The Record Details To Update Them");
        header('Location: '.$route);
    }
    else
    {
        if ($anyTenantsPresent == "Yes")
            $anyTenantsPresent = 1;
        else
            $anyTenantsPresent = 0;
            
        $update = UpdateRecord($PDO, $recordID, $propertyID, $hallwayNotes, $kitchenNotes, $livingRoomNotes, $stairsAndLandingNotes, $bathroomNotes, $toiletNotes, $anyTenantsPresent, $tenantsPresent, $tenantRoomNotes, $smokeAlarmNotes, $applianceNotes, $extraNotes, $timeSubmitted, $submittedBy);
        if ($update)
        {
            require __DIR__.'/../redirects/redirect_admin.php';
        }
        else
        {
            Alert("Error Updating Property. Property Not Updated");
           // header('Location: '.$route);
        }
    }
?>
