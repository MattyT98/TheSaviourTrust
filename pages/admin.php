<?php
    session_start();
    require('../php/security_check_admin.php'); //Does the necessary security check.
    $page = $title = 'Admin';
    include "../partials/header.php";
?>
<!DOCTYPE html>
<html>
    <body class="body">
        <?php
            include "../partials/navbar.php"
        ?>
        <div class="container-fluid sticky-footer-wrapper mainContent">
            <div class="row vh90 padding-top-100 text-center align-cotent-center justify-content-center margin-gap-sidebar">
                <div class="col-md-12 ">                  
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="h1-responsive font-weight-bold text-center my-4 form-padding-50">Add / Edit Users, Houses and Tenants Here</h1>
                        </div>    
                    </div>           
                    
                    <div class="row padding-top-50">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <a href="viewUsers.php" class="btn btn-admin-nav btn-block form-send-opacity font-weight-bold text-center">View Users</a>
                        </div>
                        <div class="col-sm-3">
                            <a href="createUser.php" class="btn btn-admin-nav btn-block form-send-opacity font-weight-bold text-center">Create User</a>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    
                    <div class="row padding-top-50">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <a href="viewProperties.php" class="btn btn-admin-nav btn-block form-send-opacity font-weight-bold text-center">View Properties</a>
                        </div>
                        <div class="col-sm-3">
                            <a href="createProperty.php" class="btn btn-admin-nav btn-block form-send-opacity font-weight-bold text-center">Create Property</a>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>

                    <div class="row padding-top-50">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <a href="viewPropertiesRecords.php" class="btn btn-admin-nav btn-block form-send-opacity font-weight-bold text-center">View Records</a>
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



