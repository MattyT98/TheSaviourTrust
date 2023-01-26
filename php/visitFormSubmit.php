<?php
    session_start();
    require 'security_check.php';
    
    $route = $_SERVER['HTTP_REFERER'];
        
    $propertyID = filter_input(INPUT_POST,'propertyID',FILTER_SANITIZE_SPECIAL_CHARS); //Required
    $hallwayNotes = filter_input(INPUT_POST,'hallwayNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $kitchenNotes = filter_input(INPUT_POST,'kitchenNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $livingRoomNotes = filter_input(INPUT_POST,'livingRoomNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $stairsAndLandingNotes = filter_input(INPUT_POST,'stairsAndLandingNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $bathroomNotes = filter_input(INPUT_POST,'bathroomNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $toiletCheck = filter_input(INPUT_POST,'toiletCheck',FILTER_SANITIZE_SPECIAL_CHARS); //Required
    $tenantsPresent = filter_input(INPUT_POST,'tenantsPresent',FILTER_SANITIZE_SPECIAL_CHARS);
    $anyTenantsPresent = false;
    $tenantRoomNotes = filter_input(INPUT_POST,'tenantRoomNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $smokeAlarmNotes = filter_input(INPUT_POST,'smokeAlarmNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $applianceNotes = filter_input(INPUT_POST,'applianceNotes',FILTER_SANITIZE_SPECIAL_CHARS);
    $extraNotes = filter_input(INPUT_POST,'extraNotes',FILTER_SANITIZE_SPECIAL_CHARS);

    $submittedByStaff = $_SESSION['Username']; //Required (Automatic Through Being Logged In)
    
    if (!empty($_POST['anyTenantsPresent'])) { //automatic depending on checkbox
        $anyTenantsPresent = 1;
      } else {
        $anyTenantsPresent = 0;
      }

    if (!isset($propertyID) || !isset($submittedByStaff)){
        alert("Please Fill In All Required Details Marked With An *");
    }
    else {
        $create = InsertVisitRecord($PDO, $propertyID, $hallwayNotes, $kitchenNotes, $livingRoomNotes, $stairsAndLandingNotes, $bathroomNotes, $toiletCheck, $anyTenantsPresent, $tenantsPresent, $tenantRoomNotes, $smokeAlarmNotes, $applianceNotes, $extraNotes, $submittedByStaff);
        
        if ($create)
        {
            require __DIR__.'/../redirects/redirect_home.php';
        }
        else
        {
            print "Error creating account.";
            header('Location: '.$route);
        }        
    }
?>
