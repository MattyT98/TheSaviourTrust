<?php
    session_start();
    require 'security_check_admin.php';
    
    $route = $_SERVER['HTTP_REFERER'];

    $firstname = filter_input(INPUT_POST,'forename',FILTER_SANITIZE_SPECIAL_CHARS);
    $surname = filter_input(INPUT_POST,'surname',FILTER_SANITIZE_SPECIAL_CHARS);
    $admin = filter_input(INPUT_POST,'adminPermission',FILTER_SANITIZE_SPECIAL_CHARS);
    $staffType = filter_input(INPUT_POST,'staffType',FILTER_SANITIZE_SPECIAL_CHARS);
    $staffUsername =$_POST['staffUsername'];
    $staff = GetStaffMember($PDO, $staffUsername);

    
    if (!isset($firstname) && !isset($surname) && !isset($admin) && !isset($staffType))
    {
        Alert("Please Change One Of The Staff Members Details To Update Them");
        header('Location: '.$route);
    }
    else
    {
        if (empty($firstname))
        {
            $firstname = $staff['Forename'];
        }
        
        if (empty($surname))
            $surname = $staff['Surname'];
        
        if (empty($admin))
            $admin = $staff['AdminPermission'];
        
        if (empty($staffType))
            $staffType = $staff['StaffType'];
            
            $update = UpdateUser($PDO, $firstname, $surname, $admin, $staffType, $staffUsername);
            if ($update)
            {
                require __DIR__.'/../redirects/redirect_admin.php';
            }
            else
            {
                Alert("Error Updating Account. Account Not Updated");
                header('Location: '.$route);
            }
    }
?>
