<?php
    //Connect to the database
    require("database_connection.php");

    //Verify login & session
    function VerifySession($PDO, $username){
        $RESULT = $PDO->query("SELECT `Username` FROM `staff` WHERE `Username`='$username'");
        if (!$RESULT){
            require __DIR__.'/../redirects/redirect_login.php';
            exit;
        }
    };
    function VerifySessionAdmin($PDO, $username){
        $RESULT = $PDO->query("SELECT `Username` FROM `staff` WHERE `Username`='$username'");
        if (!$RESULT){
            require __DIR__.'/../redirects/redirect_login.php';
            exit;
        }
        else {             
            $RES = $PDO->query("SELECT * FROM `staff` WHERE `Username`='$username'");
            $ROW = $RES->fetch(); //Get row from result(s)
            $AdminPermission = $ROW[4];

            if ($AdminPermission == 0){
                require __DIR__.'/../redirects/redirect_home.php';
                exit;
            } 
        }        
    };
    function VerifyLogin($PDO,$username,$password){
        $RESULT = $PDO->query("SELECT * FROM `staff` WHERE `Username`='$username'");

        if (!$RESULT){
            require __DIR__.'/../redirects/redirect_login.php';
            exit;
        }

        $ROW = $RESULT->fetch(); //Get row from result(s)

        if (!$ROW){
            require __DIR__.'/../redirects/redirect_login.php';
            exit;
        }

        $hashed = $ROW['Password'];
        if (password_verify($password,$hashed))
        {
            $_SESSION['Username'] = $ROW['Username']; //User logged in and is saved for this session.
            require __DIR__.'/../redirects/redirect_login_success.php';
        }
        else
            require __DIR__.'/../redirects/redirect_login.php';
    };

    //Verify different level of Permissions
    function VerifyAdminPermissions($PDO, $username, $route){        
        $RESULT = $PDO->query("SELECT `Username` FROM `staff` WHERE `Username`='$username'");
        if (!$RESULT){
            require __DIR__.'/../redirects/redirect_login.php';
            exit;
        }
        else {             
            $RES = $PDO->query("SELECT * FROM `staff` WHERE `Username`='$username'");
            $ROW = $RES->fetch(); //Get row from result(s)
            $AdminPermission = $ROW[4];

            if ($AdminPermission == 1){
                require __DIR__.'/../redirects/redirect_admin.php';
                exit;
            }
            else {
                $message = "Access Denied: You Don't have The Correct Permissions";
                header('Location: '.$route);
                alert($message);
            }    
        }        
    };

    //Pop up  & Console Logging for debugging
    function alert($message) {      
        // Display the alert box 
        echo "<script>alert('$message');</script>";
    }
    function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log('.json_encode($output, JSON_HEX_TAG).');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }
      
    //Get StaffFullName from username
    function GetNameFromUsername($PDO)
    {
        $username = $_SESSION['Username'];
        $SQL = "SELECT `forename` FROM `staff` WHERE `Username`='$username'";
        $RESULTS = $PDO->query($SQL);

        if ($RESULTS)
            return $RESULTS->fetchColumn();
        else
            return "";
    }

    // Get Functions (SELECT)
    function GetAllStaff($PDO) {
        $SQL = "SELECT * FROM `staff`";
        $RESULTS = $PDO->query($SQL);
        if(!$RESULTS){
            return [];
        }else{
            return $RESULTS->fetchAll();
        }
    }
    function GetStaffMember($PDO, $staffName) {
        $Staff = GetAllStaff($PDO);
        foreach ($Staff as $staff) {
            if ($staff['Username'] == $staffName)
                return $ReturnStaff = $staff;
        } 
    }

    function GetAllProperties($PDO) {
        $SQL = "SELECT * FROM `properties`";
        $RESULTS = $PDO->query($SQL);
        if(!$RESULTS){
            return [];
        }else{
            return $RESULTS->fetchAll();
        }
    }
    function GetProperty($PDO, $propertyID) {
        $Properties = GetAllProperties($PDO);
        foreach ($Properties as $property) {
            if ($property['PropertyID'] == $propertyID)
                return $ReturnProperty = $property;
        }
    }

    function GetAllStaffImages($PDO) {
        $SQL = "SELECT * FROM `staffimages`";
        $RESULTS = $PDO->query($SQL);
        
        if(!$RESULTS){
            return [];
        }else{
            return $RESULTS->fetchAll();
        }
    }
    function GetStaffImage($PDO, $Username) {
        $Images = GetAllStaffImages($PDO);
        foreach ($Images as $image) {
            if ($image['staffUsername'] == $Username)
                return $returnImage = $image;
        }
    }

    function GetAllRecords($PDO) {
        $SQL = "SELECT * FROM `records`";
        $RESULTS = $PDO->query($SQL);
        
        if(!$RESULTS){
            return [];
        }else{
            return $RESULTS->fetchAll();
        }
    }
    function GetAllHouseRecords($PDO, $propertyID) {
        $SQL = "SELECT * FROM `records` WHERE `PropertyID` = '$propertyID' ORDER BY TimeSubmitted DESC;";
        $RESULTS = $PDO->query($SQL);

        if(!$RESULTS){
            return [];
        }else{
            return $RESULTS->fetchAll();
        }
    }

    //Create Functions (INSERT)
    function CreateNewUser($PDO, $forename, $surname, $password, $adminPermission, $staffType){
        $staffUsername = $forename[0].$surname;
        $userExistsAlready = false;        

        $Staff = GetAllStaff($PDO);
        foreach ($Staff as $staff) {
            if ($staff['Username'] == $staffUsername)
                $UserExistsAlready = true;
        }

        if (!$UserExistsAlready){
            $SQL = "INSERT INTO `staff` VALUE ('$staffUsername','$forename', '$surname', '$password', '$adminPermission', '$staffType')";
            $RESULT = $PDO->exec($SQL);
            if ($RESULT==1){
                return true;
            }
            return false;
        }                
        return false;            
    }
    function CreateNewProperty($PDO, $houseNo, $street, $postcode, $city, $county, $bedrooms){
        $propertyExistsAlready = false;        

        $Properties = GetAllProperties($PDO);
        foreach ($Properties as $property) {
            if (($property['HouseNo'] == $houseNo) && ($property['Street'] == $street))
                $propertyExistsAlready = true;
        }

        if (!$propertyExistsAlready){
            $SQL = "INSERT INTO `properties` VALUE (NULL, '$houseNo','$street', '$postcode', '$city', '$county', '$bedrooms')";
            $RESULT = $PDO->exec($SQL);
            if ($RESULT==1){
                return true;
            }
            return false;
        }                
        return false;            
    }
    function UploadStaffImage($PDO, $name, $staffUsernameToUploadImageTo) { //Image Upload Staff Images 
        $SQL = "INSERT INTO `staffimages` VALUE (NULL, '$name', '$staffUsernameToUploadImageTo')";
        $RESULT = $PDO->exec($SQL);
        if ($RESULT==1){
            return true;
        }
        return false;
    }
    function InsertVisitRecord($PDO, $propertyID, $hallwayNotes, $kitchenNotes, $livingRoomNotes, $stairsAndLandingNotes, $bathroomNotes, $toiletCheck, $anyTenantsPresent, $tenantsPresent, $tenantRoomNotes, $smokeAlarmNotes, $applianceNotes, $extraNotes, $submittedByStaff) {
        
        $SQL = "INSERT INTO `records` VALUE (NULL, '$propertyID', '$hallwayNotes', '$kitchenNotes', '$livingRoomNotes', '$stairsAndLandingNotes', '$bathroomNotes', '$toiletCheck', '$anyTenantsPresent', '$tenantsPresent', '$tenantRoomNotes', '$smokeAlarmNotes', '$applianceNotes', '$extraNotes', CURRENT_TIMESTAMP,'$submittedByStaff')";
        
        $RESULT = $PDO->exec($SQL);
        if ($RESULT==1){
            return true;
        }
        return false;
    }

    //Update Functions
    Function UpdateUser($PDO, $firstname, $surname, $admin, $staffType, $username) {
        $SQL = "UPDATE staff SET Forename=?, Surname=?, AdminPermission=?, StaffType=? WHERE Username=?";
        $stmt= $PDO->prepare($SQL);
        $stmt->execute([$firstname, $surname, $admin, $staffType, $username]); 

        $count = $stmt->rowCount();                       
        if ($count == 0){
            return false;
        }
        return true;
    }
    
    Function UpdateProperty($PDO, $houseNo, $street, $postcode, $city, $county, $bedrooms, $propertyID) {
        $SQL = "UPDATE properties SET HouseNo=?, Street=?, Postcode=?, City=?, County=?, Bedrooms=? WHERE PropertyID=?";
        $stmt= $PDO->prepare($SQL);
        $stmt->execute([$houseNo, $street, $postcode, $city, $county, $bedrooms, $propertyID]); 

        $count = $stmt->rowCount();                       
        if ($count == 0){
            return false;
        }
        return true;
    }

    //Delete Functions (DELETE)
    function DeleteUser($PDO, $staffToDelete)
    {
        DeleteImageFromStaffImages($PDO, $staffToDelete);

        $sql = "DELETE FROM staff WHERE Username=?";
        $stmt= $PDO->prepare($sql);
        $stmt->execute([$staffToDelete]);
    }
    function DeleteProperty($PDO, $propertyID)
    {
        $sql = "DELETE FROM properties WHERE PropertyID=?";
        $stmt= $PDO->prepare($sql);
        $stmt->execute([$propertyID]);
    }    
    function DeleteImageFromStaffImages($PDO, $staffToDeleteUsername)
    {        
        $image = GetStaffImage($PDO, $staffToDeleteUsername);
        $files = glob(__DIR__.'/../uploadedImages/staffImages/'.$image['name']); // get all file names

        foreach($files as $file) { // iterate files
            if(is_file($file)) {
                unlink($file); // delete file
            }
        }
        $sql = "DELETE FROM staffimages WHERE staffUsername = ?";
        $stmt= $PDO->prepare($sql);
        $stmt->execute([$staffToDeleteUsername]);   
    }
?>