<?php
    session_start();
    require('../php/security_check_admin.php'); //Does the necessary security check.
    $page = $title = 'Admin';
    include "../partials/header.php";

    $Staff = GetAllStaff($PDO); //Returns empty array on fail or none.
    $currentLoggedIn = $_SESSION['Username'];
?>
<!DOCTYPE html>
<html>
    <body class="body">
        <?php
            include "../partials/navbar.php"
        ?>

        <div class="container-fluid sticky-footer-wrapper mainContent">
            <div class="row vh90 padding-top-100 text-center align-cotent-center justify-content-center margin-gap-sidebar">
                <div class="col-md-12">                  
                    <div class="row">
                        <div class="col-sm-3"></div>                        
                        <div class="col-sm-6">
                            <h1 class="h1-responsive font-weight-bold text-center my-4 form-padding-50">View Users</h1>
                            <a href="admin.php" class="btn btn-admin-nav btn-block form-send-opacity font-weight-bold text-center">Back</a>
                        </div>  
                        <div class="col-sm-3"></div>
                    </div>
                    
                    <div class="row padding-top-50">
                        <div class="col-sm-3"></div>                        
                        <div class="col-sm-6 table-responsive">
                            <table class="table table-hover users-table-background">
                                <thead>
                                    <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col">forename</th>
                                        <th scope="col">Surname</th>
                                        <th scope="col">Admin Permissions</th>
                                        <th scope="col">Staff Type</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($Staff as $staff) {
                                            $sUsername = $staff['Username'];
                                            $sForename = $staff['Forename'];
                                            $sSurname = $staff['Surname'];
                                            $sAdminPermission = $staff['AdminPermission'];
                                            $sStaffType = $staff['StaffType'];

                                            echo '
                                                <tr>
                                                    <td>'.$sUsername.'</td>
                                                    <td>'.$sForename.'</td>
                                                    <td>'.$sSurname.'</td>
                                                    <td>'.$sAdminPermission.'</td>
                                                    <td>'.$sStaffType.'</td>
                                                    <td><a href="viewUser.php?staffToView='.$sUsername.'" class="btn-admin-nav btn-block form-send-opacity font-weight-bold text-center text-decoration-none">View/Edit Staff</a></td>
                                                    <td><a href="../php/deleteUser.php?userToDelete='.$sUsername.'&currentlyLoggedIn='.$currentLoggedIn.'" class="btn-admin-nav btn-block form-send-opacity font-weight-bold text-center text-decoration-none">Remove Staff</a></td>
                                                </tr>
                                            ';
                                        };
                                    ?>                                    
                                </tbody>                                
                            </table>
                        </div>  
                        <div class="col-sm-3"></div>
                    </div>                    
                </div>
            </div>       

            <div class="container-fluid">
                <div class="row margin-gap-sidebar">
                    <div class="row footer">
                        <div class="col-sm-12 text-center text-dark padding-top-50 padding-bottom-20">
                            <?php
                                include "../partials/footer.php" 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>





