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
            <div class="row padding-top-100 text-center align-cotent-center justify-content-center margin-gap-sidebar">
                <div class="col-md-12">                  
                    <div class="row">
                        <div class="col-sm-3"></div>                        
                        <div class="col-sm-6">
                            <h1 class="h1-responsive font-weight-bold text-center my-4 form-padding-50">Create New User</h1>
                            <a href="admin.php" class="btn btn-admin-nav btn-block form-send-opacity font-weight-bold text-center">Back</a>
                        </div>  
                        <div class="col-sm-3"></div>
                    </div>          
                    
                    <div class="row padding-top-50">
                        <div class="col-md-12">
                            <form id="createuserForm" name="createUserForm" action="../php/createNewUser.php" method="POST">
                                <div class="row form-group">                               
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4 padding-top-10">
                                        <label>First Name *</label>
                                        <input type="text" id="forename" class="form-control" name="forename" placeholder="Forename" required>
                                    </div>
                                    <div class="col-sm-4 align-self-end padding-top-10">
                                        <label>Surname *</label>
                                        <input type="text" id="surname" class="form-control" name="surname" placeholder="Surname" required>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                <div class="row form-group padding-top-10">                               
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <label>Password *</label>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="password" required>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                <div class="row form-group padding-top-10">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <label>Staff Type *</label>
                                        <select id="type" name ="staffType" class="form-control">
                                            <option selected>Choose...</option>
                                            <option value="Support Worker">Support Worker</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                <div class="row form-group padding-top-10">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <label>Permission Level *</label>
                                        <select id="type" name ="adminPermission" class="form-control">
                                            <option selected>Choose...</option>
                                            <option value="0">0</option>
                                            <option value="1">1 (Admin Access)</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                <div class="row form-group padding-top-50">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                        <button class="btn btn-home btn-dark btn-block form-send-opacity text-dark" id="submitBtn" type="submit">Create User</button>
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                            </form>
                        </div>  
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





