<?php
    session_start();
    require('../php/security_check_admin.php'); //Does the necessary security check
    $page = $title = 'Admin';
    include "../partials/header.php";    
    $route = $_SERVER['HTTP_REFERER'];

    $staffUsername = $_GET['staffToView'];
    $staffUsername = filter_var($staffUsername,FILTER_SANITIZE_SPECIAL_CHARS);

    $staff=null;
    if ($staffUsername != "")
        $staff = GetStaffMember($PDO,$staffUsername);
    else
        header('Location: '.$route);
        
    $image = GetStaffImage($PDO, $staffUsername);;
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
                            <h1 class="h1-responsive font-weight-bold text-center my-4 form-padding-50">Viewing:
                                <?php
                                    $forename = $staff['Forename'];
                                    $surname = $staff['Surname'];
                                    echo $forename." ".$surname;
                                ?>
                            </h1>
                            <div class="row">
                                <div class="col-sm-2"></div> 
                                <div class="col-sm-4">
                                    <a href="viewUsers.php" class="btn btn-admin-nav btn-block form-send-opacity font-weight-bold text-center">Back</a>
                                </div> 
                                <div class="col-sm-4">
                                    <a href="admin.php" class="btn btn-admin-nav btn-block form-send-opacity font-weight-bold text-center">home</a>
                                </div> 
                                <div class="col-sm-2"></div> 
                            </div>
                        </div>  
                        <div class="col-sm-3"></div>
                    </div>           
                    
                    <div class="row padding-top-50">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-5">
                            <div class="row align-cotent-center justify-content-center">
                                <div class="col-md-12">
                                    <div class="row padding-top-50">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-10">
                                            <img class="img-fluid viewUserProfileImg" src='../uploadedImages/staffImages/<?php echo $image["name"];?>'>
                                        </div>
                                        <div class="col-sm-1"></div>
                                    </div>

                                    <div class="row padding-top-50">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-10">
                                            <form method="post" enctype="multipart/form-data" action="../php/uploadStaffImage.php">
                                                <input class="form-control" type="file" name="file" accept="image/*" required>
                                                <input class="form-control" type="hidden" name="staffUsername" value="<?php echo $staffUsername?>">
                                                <input class="form-control" type="submit" name="imageUpload" value="Upload">
                                            </form>    
                                        </div>
                                        <div class="col-sm-1"></div>
                                    </div>                            
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <form id="updateForm" name="updateForm" action="../php/updateUser.php" method="POST">              
                                <div class="row">                             
                                    <div class="col-sm-1"></div>
                                    <div class="col-xl-5 padding-top-10">
                                        <h2>Username: </h2>
                                    </div>
                                    <div class="col-xl-5 align-self-end padding-top-10">
                                        <h3 class="ms-auto"><?php echo $staff['Username'];?></h3>
                                        <input class="form-control" type="hidden" name="staffUsername" value="<?php echo $staffUsername?>">
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>

                                <div class="row padding-top-50">                             
                                    <div class="col-sm-1"></div>
                                    <div class="col-xl-5 padding-top-10">
                                        <h2>Forename: </h2>
                                    </div>
                                    <div class="col-xl-5 align-self-end padding-top-10">
                                        <h3><?php echo $staff['Forename'];?></h3>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                                <div class="row">                             
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="forename" placeholder="Enter New First Name">    
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>

                                <div class="row padding-top-50">                             
                                    <div class="col-sm-1"></div>
                                    <div class="col-xl-5 padding-top-10">
                                        <h2>Surname: </h2>
                                    </div>
                                    <div class="col-xl-5 align-self-end padding-top-10">
                                        <h3 class="ms-auto"><?php echo $staff['Surname'];?></h3>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                                <div class="row">                             
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="surname" placeholder="Enter New Surname">    
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>

                                <div class="row padding-top-50">                             
                                    <div class="col-sm-1"></div>
                                    <div class="col-xl-5 padding-top-10">
                                        <h2>Admin Permission: </h2>
                                    </div>
                                    <div class="col-xl-5 align-self-end padding-top-10">
                                        <h3 class="ms-auto"><?php echo ($staff['AdminPermission'] == 1) ? "Yes" : "No";?></h3>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                                <div class="row">                             
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                        <select id="type" name="adminPermission" class="form-control">
                                            <option value="">Choose...</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                                
                                <div class="row padding-top-50">                             
                                    <div class="col-sm-1"></div>
                                    <div class="col-xl-5 padding-top-10">
                                        <h2>Account Type: </h2>
                                    </div>
                                    <div class="col-xl-5 align-self-end padding-top-10">
                                        <h3 class="ms-auto"><?php echo $staff['StaffType'];?></h3>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                                <div class="row">                             
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                        <select id="type" name="staffType" class="form-control">
                                            <option value="">Choose...</option>
                                            <option value="Support Worker">Support Worker</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div> 

                                <div class="row form-group padding-top-50">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                        <button class="btn btn-home btn-dark btn-block form-send-opacity text-dark" id="submitBtn" type="submit">Update Details</button>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-1"></div>
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


