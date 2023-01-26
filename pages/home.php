<?php
    session_start();
    require('../php/security_check.php'); //Does the necessary security check.
    $page = $title = 'Home';
    include "../partials/header.php";

    $staffUsername = $_SESSION['Username'];
    $image = GetStaffImage($PDO, $staffUsername);;
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
                        <div class="col-sm-12">
                            <h1 class="h1-responsive font-weight-bold text-center my-4 form-padding-50">Current User: 
                                <?php
                                    $staffName = GetNameFromUsername($PDO);
                                    echo $staffName;                                    
                                ?>
                            </h1>
                        </div>    
                    </div>           
                    
                    <div class="row">
                        <div class="col-md-12">
                            <img class="img-fluid viewUserProfileImg" src='../uploadedImages/staffImages/<?php echo $image["name"];?>'>
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





